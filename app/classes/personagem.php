<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model; 

class Personagem extends Model
{
    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array
     */
    protected $casts = [
        'aparencia_id' => 'integer',
        'hp_atual' => 'integer',
        'hp_maximo' => 'integer',
        'defesa' => 'integer',
        'agilidade' => 'integer',
        // Adicione outros atributos como Força, Inteligência, etc. aqui
    ];

    // --- Propriedades para rastrear os equipamentos escolhidos ---

    /** @var string|null */
    protected $escudo_escolhido = null;

    /** @var string|null */
    protected $armadura_escolhida = null;

    /** @var string|null */
    protected $equipamento_escolhido = null;

    /** @var array */
    protected $ataques_escolhidos = [];

    // --- Métodos de Lógica do Jogo ---

    /**
     * Retorna a descrição do avatar escolhido.
     * @return string
     */
    public function getDescricaoAparenciaAttribute(): string
    {
        switch ($this->aparencia_id) {
            case 1:
                return 'Guerreira das Chamas';
            case 2:
                return 'Mago das Sombras';
            case 3:
                return 'Arqueira Celestial';
            case 4:
                return 'Lux';
            // Adicione aqui a descrição do "Guerreiro das Sombras (JJ)" se o aparencia_id for diferente de 1-4
            default:
                return 'Aparência Desconhecida';
        }
    }

    /**
     * Define o equipamento/ataque escolhido para o personagem.
     * @param string $tipo Tipo de item ('escudo', 'armadura', 'equipamento', 'ataque')
     * @param string $nome Nome do item (ex: 'Escudo de Plasma')
     */
    public function escolherItem(string $tipo, string $nome): void
    {
        switch (strtolower($tipo)) {
            case 'escudo':
                $this->escudo_escolhido = $nome;
                break;
            case 'armadura':
                $this->armadura_escolhida = $nome;
                break;
            case 'equipamento':
                $this->equipamento_escolhido = $nome;
                break;
            case 'ataque':
                // Permite múltiplos ataques, se for a regra do seu jogo
                if (!in_array($nome, $this->ataques_escolhidos)) {
                     $this->ataques_escolhidos[] = $nome;
                }
                break;
            default:
                // Se o tipo for inválido, você pode querer registrar ou lançar uma exceção
                break;
        }
    }

    /**
     * Aplica os bônus estáticos (como os da Armadura) aos atributos do personagem.
     * Este é um método simplificado.
     */
    public function aplicarAtributosEstaticos(): void
    {
        // Reseta atributos base antes de aplicar (boa prática)
        // $this->defesa = $this->getAttribute('defesa_base'); 
        // $this->agilidade = $this->getAttribute('agilidade_base');
        
        // Aplica Armadura
        if ($this->armadura_escolhida === 'Armadura de Fênix') {
            $this->agilidade += 20;
            $this->defesa += 5;
        } elseif ($this->armadura_escolhida === 'Armadura do Guardião Solar') {
            $this->defesa += 30;
            $this->agilidade += 7;
        } elseif ($this->armadura_escolhida === 'Armadura Titânica Obsidiana') {
            $this->defesa += 45;
            $this->agilidade -= 10;
        }
        
        // Aplica Equipamento (Exemplo)
        if ($this->equipamento_escolhido === 'Navegador Quântico') {
            // Supondo que 'velocidade_movimento' seja um atributo
            // $this->velocidade_movimento += 20; 
        }

        // Os Escudos e Ataques geralmente têm sua lógica aplicada durante a batalha.
    }
}
