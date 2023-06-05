<?php

namespace Tests\Unit;

use App\Http\Business\ReservaBusiness;
use App\Http\Interfaces\EletroRepositoryInterface;
use App\Http\Interfaces\ReservaRepositoryInterface;
use App\Http\Services\EletrodomesticoService;
use App\Models\Eletrodomestico;
use App\Models\Reserva;
use Carbon\Carbon;
use Exception;
use Tests\TestCase;

class EletroServiceTest extends TestCase
{

    private $eletroRepository;
    protected function setUp(): void
    {
        parent::setUp();
        $this->eletroRepository = $this->createMock(EletroRepositoryInterface::class);
    }

    public function test_deve_cadastrar_eletrodomestico()
    {
        $this->eletroRepository->method('cadastrar')
            ->willReturn($this->eletrodomestico());

        $service = $this->instanciaEletrodomestico();

        $eletro = $service->cadastrarEletrodomestico([
            'nome' => 'Teste',
            'descricao' => 'teste',
            'marca' => 'BRASTEMP',
            'tensao' => '200v'
        ]);

        $this->assertIsArray($eletro);

        $this->assertArrayHasKey('nome', $eletro[0]);
    }

    public function test_deve_editar_eletrodomestico()
    {
        $eletroData = [
            'nome' => 'Teste2'
        ];
        $this->eletroRepository->method('editar')
            ->with($eletroData, 1)
            ->willReturn([
                'nome' => 'Teste2',
                'descricao' => 'teste',
                'marca' => 'BRASTEMP',
                'tensao' => '200v'
            ]);
        $service = $this->instanciaEletrodomestico();

        $eletro = $service->editarEletrodomestico([
            'nome' => 'Teste2'
        ], 1);

        $this->assertArrayHasKey('nome', $eletro);
        $this->assertEquals('Teste2',$eletro['nome']);
    }

    public function test_deve_recupera_todos_eletros()
    {

        $this->eletroRepository->method('recuperar')
            ->willReturn($this->eletrodomesticos());

        $service = $this->instanciaEletrodomestico();

        $eletro = $service->recuperarEletrodomesticos();

        $this->assertIsArray($eletro);
        $this->assertCount(2,$eletro);
    }

    public function test_deve_recuperar_um_eletro()
    {

        $this->eletroRepository->method('recuperarEletro')
            ->with(1)
            ->willReturn([
                'nome' => 'Teste',
                'descricao' => 'teste',
                'marca' => 'BRASTEMP',
                'tensao' => '200v'
            ]);

        $service = $this->instanciaEletrodomestico();

        $eletro = $service->recuperarEletrodomestico(1);

        $this->assertIsArray($eletro);

    }

    public function test_deve_deletar_eletro()
    {

        $this->eletroRepository->method('deletar')
            ->with(1);

        $service = $this->instanciaEletrodomestico();

        $eletro = $service->deletarEletrodomestico(1);

        $this->assertTrue($eletro);

    }


    public function eletrodomestico()
    {
        return [
            Eletrodomestico::make([
                'nome' => 'Teste',
                'descricao' => 'teste',
                'marca' => 'BRASTEMP',
                'tensao' => '200v'
            ])
        ];
    }

    public function eletrodomesticos()
    {
        return [
            Eletrodomestico::make([
                'nome' => 'Teste',
                'descricao' => 'teste',
                'marca' => 'BRASTEMP',
                'tensao' => '200v'
            ]),
            Eletrodomestico::make([
                'nome' => 'Teste2',
                'descricao' => 'teste',
                'marca' => 'BRASTEMP',
                'tensao' => '200v'
            ])
        ];
    }



    public function instanciaEletrodomestico()
    {
        return new EletrodomesticoService(
            $this->eletroRepository
        );
    }
}
