<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

use App\Restaurant;
use App\Category;
use App\User;

use Faker\Generator as Faker;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // SEEDER DA FILE CONFIG
        $restaurants = config('restaurants.restaurantsArray');

        foreach ($restaurants as $restaurant) {
            // new object -> restaurant
            $new_restaurant = new Restaurant();

            // User ID
            $all_users_id = User::select('id')->get()->pluck('id');
            $new_restaurant->user_id = $all_users_id->random();

            // Assign name, address, img_cover and piva
            $new_restaurant->name = $restaurant['name'];
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->piva = $restaurant['piva'];
            $new_restaurant->img_cover = $restaurant['img_cover'];

            // Slug
            $slug = Str::slug($new_restaurant->name);
            $slug_base = $slug;
            // verifico che lo slug non esista nel database
            $restaurant_exist = Restaurant::where('slug', $slug)->first();
            $contatore = 1;
            // entro nel ciclo while se ho trovato un post con lo stesso $slug
            while($restaurant_exist) {
                // genero un nuovo slug aggiungendo il contatore alla fine
                $slug = $slug_base . '-' . $contatore;
                $contatore++;
                $restaurant_exist = Restaurant::where('slug', $slug)->first();
            }
            // quando esco dal while sono sicuro che lo slug non esiste
            $new_restaurant->slug = $slug;

            // salvo il ristorante nella tabella
            $new_restaurant->save();

            // ASSEGNO LE CATEGORIES
            $thisRestaurantCategories = $restaurant['categories_id'];
            $new_restaurant->categories()->sync($thisRestaurantCategories);
        }
    }
}
