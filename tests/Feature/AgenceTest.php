<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AgenceTest extends TestCase
{
    /**
     * Tests if application is running ok
     *
     * @return void
     */
    public function test_aplication_is_running()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertSee('Agence');
    }
    /**
     * Tests list of consultores is displayed
     *
     * @return void
     */
    public function test_consultores_listed()
    {
        $response = $this->get('/consultores');

        $response->assertStatus(200);

        $resp_array = (array)json_decode($response->content());

        $this->assertArrayHasKey('consultores', $resp_array);
    }
    /**
     * Tests data of receitas is displayed
     *
     * @return void
     */
    public function test_receitas_data_is_listed()
    {
        
        $response = $this->json('POST', '/relatorio', 
                                ['fromDate' => '2007-01',
                                 'toDate'   => '2007-01',
                                 'seleccionados' => [['co_usuario' => "anapaula.chiodaro", 'no_usuario' => "Ana Paula Fontes Martins Chiodaro"]]
                                ]);

        $response->assertStatus(200);

        $resp_array = json_decode($response->content(), true);

        $this->assertArrayHasKey('name', $resp_array[0]);
        $this->assertArrayHasKey('receita', $resp_array[0]);
        $this->assertArrayHasKey('totals', $resp_array[0]);        

    }
    /**
     * Tests pie chart data is returned
     *
     * @return void
     */
    public function test_pie_chart_data_is_returned()
    {
        
        $response = $this->json('POST', '/piechartdata', 
                                ['fromDate' => '2007-01',
                                 'toDate'   => '2007-01',
                                 'seleccionados' => [['co_usuario' => "anapaula.chiodaro", 'no_usuario' => "Ana Paula Fontes Martins Chiodaro"]]
                                ]);

        $response->assertStatus(200);

        $resp_array = json_decode($response->content(), true);

        $this->assertArrayHasKey('x', $resp_array[0]);
        $this->assertArrayHasKey('value', $resp_array[0]);
        $this->assertArrayHasKey('fill', $resp_array[0]);        

    }    
    /**
     * Tests column chart data is returned
     *
     * @return void
     */
    public function test_column_chart_data_is_returned()
    {
        
        $response = $this->json('POST', '/columnchartdata', 
                                ['fromDate' => '2007-01',
                                 'toDate'   => '2007-01',
                                 'seleccionados' => [['co_usuario' => "anapaula.chiodaro", 'no_usuario' => "Ana Paula Fontes Martins Chiodaro"]]
                                ]);

        $response->assertStatus(200);

        $resp_array = json_decode($response->content(), true);

        $this->assertArrayHasKey('cost', $resp_array);
        $this->assertArrayHasKey('data', $resp_array);
        $this->assertArrayHasKey('header', $resp_array);

    }        
    
}
