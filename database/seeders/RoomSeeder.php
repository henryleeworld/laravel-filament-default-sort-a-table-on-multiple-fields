<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $floors = 10;
        $roomsPerFloor = 3;
        for ($floor = 1; $floor <= $floors; $floor++) {
            for ($room = 1; $room <= $roomsPerFloor; $room++) {
                $roomNumber = $floor . str_pad($room, 2, '0', STR_PAD_LEFT);      
                Room::factory()->create([
                    'room_number' => $roomNumber,
                    'floor' => $floor,
                ]);
            }
        }
    }
}
