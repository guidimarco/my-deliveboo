<?php

use Illuminate\Database\Seeder;
use App\Dish;
use App\Restaurant;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('restaurants.restaurantsArray');
        $dishes = config('dishes.dishesArray');

        foreach ($restaurants as $thisRestaurantId => $restaurant) {

            // tutti i piatti del ristorante -> array di numeri
            $thisRestaurantDishes = $restaurant['dishes'];

            foreach ($thisRestaurantDishes as $dishId) {
                $currentDish = $dishes[$dishId];

                // new object -> dish
                $new_dish = new Dish();

                // Restaurant ID
                $new_dish->restaurant_id = $thisRestaurantId;

                // Assign name, ingredients, description, prezzo, img
                $new_dish->name = $currentDish['name'];
                $new_dish->ingredients = $currentDish['ingredients'];
                $new_dish->description = $currentDish['description'];
                $new_dish->unit_price = $currentDish['unit_price'];
                $new_dish->visible = $currentDish['visible'];
                $new_dish->img_cover = $currentDish['img_cover'];

                // Slug
                $slug = Str::slug($new_dish->name);
                $slug_base = $slug;
                // verifico che lo slug non esista nel database
                $dish_exist = Dish::where('slug', $slug)->first();
                $contatore = 1;
                // entro nel ciclo while se ho trovato un post con lo stesso $slug
                while($dish_exist) {
                    // genero un nuovo slug aggiungendo il contatore alla fine
                    $slug = $slug_base . '-' . $contatore;
                    $contatore++;
                    $dish_exist = Dish::where('slug', $slug)->first();
                }
                // quando esco dal while sono sicuro che lo slug non esiste
                $new_dish->slug = $slug;

                // salvo il ristorante nella tabella
                $new_dish->save();
            }
        }
    }
}
