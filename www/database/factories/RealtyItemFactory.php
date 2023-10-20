<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealtyItem>
 */
class RealtyItemFactory extends Factory
{
    protected array $names = [
        'Авторский стить!',
        'Метро 10 минут.',
        'Метро 20 минут.',
        'Метро 5 минут.',
        'Модный ЖК!',
        'Видовая квартира.',
        'Дизайнерский ремонт.',
        'Новостройка с ремонтом.',
        'Уникальное предложение!',
        'Виды на Москва-Сити!',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->names[rand(0, 9)],
            'img' => rand(1,3) / 2 !== 1 ? 'image.jpg' : null,
            'floor' => rand(1, 20),
            'room_count' => rand(1, 5),
            'square' => rand(20, 200),
            'description' => 'Просторная светлая квартира. Продуманная планировка позволяет разместить кухню-гостиную и спальную комнату с санузлом и гардеробной.'
        ];
    }
}
