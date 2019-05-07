import axios from 'axios'

export default {
    getConsultores(){
        return axios.get('/consultores')
                    .then(function (response) {
                        return response.data;
                    })
    },

    getRelatorio(params){
        return axios.post('/relatorio', params)
                    .then(function (response) {
                        return response.data;
                    })
    },

    getPieChartData(params){
        return axios.post('/piechartdata', params)
                    .then(function (response) {
                        return response.data;
                    })
    },

    getColumnChartData(params){
        return axios.post('/columchartdata', params)
                    .then(function (response) {
                        return response.data;
                    })
    },
}