<template>
    <div class="container-fluid">
        <div class="box box-block bg-white b-t-0 m-b-2">
            
            <div class="text-muted m-b-1">Selecione o período para Consultar</div>
            <div class="form-group row">
                <label for="from-date" class="col-xs-1 col-sm-1 col-form-label">De</label>
                <div class="col-xs-11 col-sm-3">
                    <input v-model="fromDate" class="form-control" type="month" value="2017-01" min="2003-01" max="2007-12" id="from-date">
                </div>
            </div>
            <div class="form-group row">
                <label for="to-date" class="col-xs-1 col-sm-1 col-form-label">a</label>
                <div class="col-xs-11 col-sm-3">
                    <input v-model="toDate" class="form-control" type="month" value="2017-12" min="2003-01" max="2007-12" id="to-date">
                </div>
            </div>	
            <div class="row m-b-1">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-uppercase"><b>Lista de Consultores</b></div>
                        <div class="items-list items-container">
                            
                            <div class="il-item" v-for="(consultor, index) in consultores" @click="moveItemTo('selected', consultor, index)">
                                <a class="text-black">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="media-heading">{{consultor.no_usuario}}</h6>
                                        </div>
                                    </div>
                                    <div class="il-icon"><i class="fa fa-angle-right"></i></div>
                                </a>
                            </div>

                        </div>
                        <div class="card-block">
                            <button v-if="consultores.length > 0" type="button" @click="moveAllTo('selected')" class="btn btn-success btn-block">Seleccione Tudo</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-uppercase"><b>Consultores Selecionados</b></div>
                        <div class="items-list items-container">
                            
                            <div class="il-item-left" v-for="(consultor, index) in seleccionados" @click="moveItemTo('consultores', consultor, index)">
                                <a class="text-black">
                                    <div class="il-icon-left"><i class="fa fa-angle-left"></i></div>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="media-heading">{{consultor.no_usuario}}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            
                        </div>
                        <div class="card-block">
                            <button v-if="seleccionados.length > 0" type="button" @click="moveAllTo('consultores')" class="btn btn-danger btn-block">Limpar Tudo</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 m-b-2 m-md-b-0">


                        <button @click="listRelatorio" v-bind:disabled="seleccionados.length == 0" type="button" class="btn bg-facebook btn-block waves-effect waves-light">
                            <i class="ti-menu pull-xs-right"></i> Relatorio
                        </button>

                        <button @click="columnChart" v-bind:disabled="seleccionados.length == 0" type="button" class="btn bg-twitter btn-block waves-effect waves-light">
                            <i class="ti-bar-chart pull-xs-right"></i> Gráfico
                        </button>

                        <button @click="pieChart" v-bind:disabled="seleccionados.length == 0" type="button" class="btn bg-linkedin btn-block waves-effect waves-light">
                            <i class="ti-pie-chart pull-xs-right"></i> Pizza
                        </button>


                </div>
            </div>
            <div class="text-muted m-b-1">Clique no nome do consultor para selecioná-lo</div>

        </div>
        <div id="receitas">
        <div class="row row-md m-b-2" v-for="item in listado">
            <div class="col-md-12">
                <div class="box bg-white">
                    <table class="table table-grey-head table-hover m-md-b-0">
                        <thead>
                            <tr>
                                <th colspan="5">{{item.name}}</th>
                            </tr>
                            <tr>
                                <th class="small">Período</th>
                                <th class="small">Receita Líquida</th>
                                <th class="small">Custo Fixo</th>
                                <th class="small">Comissão</th>
                                <th class="small">Lucro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="data in item.receita">
                                <td class="small">{{data.mes_name}} de {{data.ano}}</td>
                                <td class="small">{{data.receita | currency}}</td>
                                <td class="small">{{data.custo_fixo | currency}}</td>
                                <td class="small">{{data.commisao | currency}}</td>
                                <th class="small" v-bind:class="{ 'text-primary': (data.lucro > 0), 'text-danger': (data.lucro <= 0) }">{{data.lucro | currency}}</th>
                            </tr>                                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="small">Saldo</th>
                                <th class="small">{{item.totals.tot_receita | currency}}</th>
                                <th class="small">{{item.totals.tot_custo_fixo | currency}}</th>
                                <th class="small">{{item.totals.tot_commisao | currency}}</th>
                                <th class="small" v-bind:class="{ 'text-primary': (item.totals.tot_lucro > 0), 'text-danger': (item.totals.tot_lucro <= 0) }">{{item.totals.tot_lucro | currency}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <div id="pieChart" class="row row-md m-b-2">
        </div>
        <div id="columnChart" class="row row-md m-b-2">
        </div>        
    </div>
</template>    
<script>

        import ConsultoresAPI from '../services/api'

        export default {
            name: 'listConsultores',
            data() {
                return {
                    fromDate:'2007-01',
                    toDate:'2007-01',
                    consultores: [],
                    seleccionados: [],
                    listado: []
                }
            },
            created: function(){
                ConsultoresAPI.getConsultores()
                              .then(consultores =>{
                                  this.consultores = consultores
                              })
                              .catch(error => console.log(error))
            },
            methods:{
                moveAllTo: function(where){
                    if(where == 'selected'){
                        if(this.seleccionados.length == 0){
                            this.seleccionados = this.consultores;
                        }else{
                            for(var elem in this.consultores){
                                this.seleccionados.splice(this.seleccionados.length + 1, 1, this.consultores[elem])
                            }
                        }
                        this.consultores = [];
                    }else{
                        if(this.consultores.length == 0){
                            this.consultores = this.seleccionados;
                        }else{
                            for(var elem in this.seleccionados){
                                this.consultores.splice(this.consultores.length + 1, 1, this.seleccionados[elem])
                            }
                        }
                        this.seleccionados = [];
                    }
                },
                moveItemTo: function(where, elem, index){
                    if(where == 'selected'){
                        this.consultores.splice(index, 1)
                        this.seleccionados.splice(this.seleccionados.length + 1, 1, elem)
                    }else{
                        this.seleccionados.splice(index, 1)
                        this.consultores.splice(this.consultores.length + 1, 1, elem)
                    }
                },
                listRelatorio: function(){
                    $('#pieChart, #columnChart').css('visibility', 'hidden').css('height', 0)
                    ConsultoresAPI.getRelatorio(
                        {
                            fromDate: this.fromDate,
                            toDate: this.toDate,
                            seleccionados: this.seleccionados
                        })
                        .then(listado =>{
                            $('#receitas').css('visibility', 'visible').css('height', 'auto')
                            this.listado = listado
                        })
                        .catch(error => console.log(error))
                },               
                pieChart: function(){
                    $('#pieChart').html("")
                    $('#receita, #columnChart').css('visibility', 'hidden').css('height', 0)
                    ConsultoresAPI.getPieChartData(
                        {
                            fromDate: this.fromDate,
                            toDate: this.toDate,
                            seleccionados: this.seleccionados
                        })
                        .then(chartData =>{

                            $('#pieChart').css('visibility', 'visible').css('height', 400)
                            chartData.title = 'Porcentaje de Receita por Consultor de '+moment(this.fromDate).format("MMMM Y")+' a '+moment(this.toDate).format("MMMM Y");
                            var chart = anychart.pie(chartData);

                                chart.legend()
                                        .enabled(true)
                                        .fontSize(13)
                                        .padding([0, 0, 20, 0]);

                                chart.container('pieChart');

                                chart.draw();

                        })
                        .catch(error => console.log(error))                    

                },               
                columnChart: function(){
                    $('#columnChart').html("")
                    $('#pieChart, #receitas').css('visibility', 'hidden').css('height', 0)
                    ConsultoresAPI.getColumnChartData(
                        {
                            fromDate: this.fromDate,
                            toDate: this.toDate,
                            seleccionados: this.seleccionados
                        })
                        .then(resp =>{

                                $('#columnChart').css('visibility', 'visible').css('height', 400)
                                var chartData = {
                                    title: ' Receita por Consultor de '+moment(this.fromDate).format("MMMM Y")+' a '+moment(this.toDate).format("MMMM Y"),
                                    header: resp.header,
                                    rows: [resp.data]
                                };

                                var chart = anychart.column();

                                chart.data(chartData);

                                chart.animation(true);

                                chart.yAxis().labels().format('R$ {%Value}{groupsSeparator: }');

                                chart.yAxis().title('Receita');

                                chart.labels()
                                        .enabled(true)
                                        .position('center-top')
                                        .anchor('center-bottom')
                                        .format('R$ {%Value}{groupsSeparator: }');
                                chart.hovered().labels(false);

                                chart.legend()
                                        .enabled(true)
                                        .fontSize(13)
                                        .padding([0, 0, 20, 0]);

                                chart.interactivity().hoverMode('single');

                                chart.tooltip()
                                        .positionMode('point')
                                        .position('center-top')
                                        .anchor('center-bottom')
                                        .offsetX(0)
                                        .offsetY(5)
                                        .titleFormat('{%X}')
                                        .format('{%SeriesName} : R$ {%Value}{groupsSeparator: }');

                                chart.container('columnChart');

                                chart.draw();

                        })
                        .catch(error => console.log(error))                    

                }
            },
            filters: {
                capitalize: function (value) {
                    if (!value) return ''
                    value = value.toString()
                    return value.charAt(0).toUpperCase() + value.slice(1)
                }
            }

        }
</script>