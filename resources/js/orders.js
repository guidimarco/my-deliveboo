var app = new Vue({
    el: "#app",
    data: {
        restaurants: [],
        selectedRestaurantId: 0,
        selectedRestaurant: null,
        orders: []
    },
    methods: {
        getUserId() {
            let userId = document.getElementById("user-id").value;

            return userId;
        },
        getAllOrders() {
            this.orders = [];
            let allRestaurant = this.restaurants;
            // console.log(allRestaurant);
            let allOrders = [];

            allRestaurant.forEach((currentRest) => {
                let thisRestaurantOrders = currentRest.orders;

                thisRestaurantOrders.forEach((order) => {
                    order.restaurant_name = currentRest.name;
                    order.created_at = dayjs(order.created_at).format('DD/MM/YYYY HH:mm');

                });

                if (thisRestaurantOrders.length != 0) {
                    allOrders = allOrders.concat(thisRestaurantOrders);
                }
            });

            this.orders = allOrders;
            console.log(this.orders);
            console.log(this.restaurants);
        },
        filterOrders(event) {
            // console.log(event.target.value);
            this.selectedRestaurantId = event.target.value;

            if(this.selectedRestaurantId == 0){
                this.selectedRestaurant = null;
            }else{
                for (var i = 0; i < this.restaurants.length; i++) {
                    if(this.restaurants[i].id == this.selectedRestaurantId){
                        this.selectedRestaurant = this.restaurants[i];
                    }
                }
            }

            console.log(this.orders);
            console.log(this.restaurants);
        }
    },
    mounted() {
        let self = this;

        let userId = self.getUserId();
        // console.log(userId);

        axios.get('http://localhost:8000/api/user-orders/' + userId).then((response) => {
            let userRestaurants = response.data.results.userRestaurant;
            console.log(userRestaurants);
            self.restaurants = userRestaurants;
            self.getAllOrders();
            // console.log(self.orders);
        })


    }
});
