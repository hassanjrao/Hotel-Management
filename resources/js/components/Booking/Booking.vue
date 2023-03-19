<template>
    <div id="content" class="pb30">

        <div id="search-page" class="mt20 mt20">
            <div class="container" style="padding-top:140px">

                <form action="" method="GET" class="booking-search">

                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Destination</div>
                                    <select name="destination" id="" class="form-control" v-model="selected_destination">
                                        <option value="">Select Destination</option>
                                        <option v-for="destination in destinations" v-bind:value="destination.id">
                                            {{ destination.name }}
                                        </option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="input-wrapper datepicker-wrapper form-inline">
                                <div class="input-group from-date">

                                    <input type="date" class="form-control hasDatepicker" id="from_picker" name="from_date"
                                        placeholder="Check in" v-model="from_date">


                                </div>

                                <i class="fas fa-fw fa-long-arrow-alt-right"></i>
                                <div class="input-group to-date">

                                    <input type="date" class="form-control hasDatepicker" id="to_picker" name="to_date"
                                        v-model="to_date" placeholder="Check out">


                                </div>
                            </div>
                            <div class="field-notice" rel="dates"></div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Entered Persons</div>

                                    <input type="text" name="total_adults" class="form-control" v-model="entered_persons"
                                        min="0">


                                </div>
                            </div>
                        </div>

                        <div class="col-md-1 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit"
                                    name="check_availabilities">GO</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="boxed mb20">
                        <h2>Book on our website</h2>
                        <p class="lead mb0">Hurry up! Select the your rooms, complete your booking and take advantage of
                            our special offers and packages!<br><b>Best price guarantee!</b></p>
                    </div>



                    <div class="boxed mb20 booking-result" v-for="(hotel, index) in hotels" :key="index">
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <div class="img-container lazyload md" style="overflow: hidden; position: relative;">
                                    <img alt="" itemprop="photo" width="300" height="170" :src="hotel.image"
                                        style="position: absolute; width: auto; height: 245px; top: 0px; left: -92.5px;"
                                        class="loaded">
                                </div>
                            </div>
                            <div class="pt15 col-sm-4 col-md-5">
                                <h3>
                                    {{ hotel.title }}

                                </h3>
                                {{ hotel.sub_title }}
                                <div class="clearfix mt10" v-for="(facility, index) in hotel.facilities" :key="index">

                                    <span class="facility-icon">
                                        <img :alt="facility.name" :title="facility.name" :src="facility.image" class="tips">
                                    </span>


                                </div>
                            </div>
                            <div class="pt15 pb15 col-sm-4 col-md-3 text-center sep">
                                <div class="price text-primary">
                                    From <span itemprop="priceRange">
                                        {{ appCurrency }} {{ hotel.min_price }}
                                    </span>
                                    / night </div>


                                <a href="#" v-on:click="openHotelRooms(hotel)" data-toggle="collapse"
                                    class="btn btn-success btn-block mt10 anchor-toggle">
                                    Book </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 panel-collapse collapse" :id="'hotelRooms-' + hotel.id">

                                <div class="row">
                                    <div class="col-md-12">
                                        <span data-toggle="collapse" class="btn-toggle collapsed" aria-expanded="false">

                                            <i class="fas fa-fw fa-angle-up"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="boxed mt10 booking-summary">
                                            <p class="lead mb0">
                                                <i class="fas fa-fw fa-calendar"></i>
                                                <b>{{ from_date }}</b>
                                                <i class="fas fa-fw fa-arrow-right"></i>
                                                <b>{{ to_date }}</b>
                                            </p>

                                            <span id="booking-amount_2" v-if="hotel.total_selected_rooms > 0">
                                                <i class="fas fa-fw fa-tags"></i>
                                                <b>

                                                    {{ hotel.total_selected_rooms }}


                                                </b> Room(s)
                                                <i class="fas fa-fw fa-male"></i>
                                                <b>
                                                    {{ hotel.total_selected_persons }}
                                                </b> Person(s)
                                                <i class="fas fa-fw fa-caret-right"></i>

                                                <button v-on:click="submitBooking(hotel)" id="btn-book_2"
                                                    class="btn btn-success btn-lg btn-block mt5"><b>Total US {{
                                                        hotel.total_amount }}</b>
                                                    <i class="fas fa-fw fa-hand-point-right"></i>
                                                    Book</button>
                                            </span>

                                        </div>
                                    </div>
                                </div>

                                <div class="boxed">

                                    <div class="row room-result" v-for="(room, roomIndex) in hotel.rooms">
                                        <div class="col-lg-3 hidden-sm hidden-xs">
                                            <div class="img-container lazyload md">
                                                <img alt="" data-src="/medias/room/small/2/screenshot-2022-06-24-203112.png"
                                                    itemprop="photo" width="286" height="300">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-md-3 col-lg-3">
                                            <h4>{{ room.title }}</h4>
                                            <p>{{ room.sub_title }}</p>
                                            <div class="clearfix mt10">

                                                <span class="facility-icon"
                                                    v-for="(roomFacility, roomFacilityIndex) in room.facilities">
                                                    <img :alt="roomFacility.name" :title="roomFacility.name"
                                                        :src="roomFacility.image" class="tips">
                                                </span>


                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-right sep">
                                            <div class="price">
                                                <span itemprop="priceRange">
                                                    {{ appCurrency }}
                                                    {{ room.price_per_night }}
                                                </span>
                                            </div>
                                            <div class="mb10 text-muted">Price / night</div>
                                            Capacity :
                                            <i class="fas fa-fw fa-male"></i>
                                            {{ room.max_people }}
                                            <div class="pt10 form-inline">
                                                <i class="fas fa-fw fa-tags"></i>
                                                Num rooms<br>
                                                <select name="total_rooms" class="form-control"
                                                    v-on:change="updateRoomCount(room, $event)">
                                                    <option value="0">0</option>
                                                    <option v-for="n in room.total_rooms" :value="n">
                                                        {{ n }}
                                                    </option>
                                                </select>

                                            </div>

                                        </div>
                                        <div class="clearfix"></div>



                                        <div class="row mb5 bg-success py5 justify-content-space-between"
                                            v-for="(roomRow, roomRowIndex) in room.room_rows">
                                            <div class="col-lg-2">
                                                <h4><b>Room {{ roomRowIndex + 1 }}</b></h4>
                                            </div>
                                            <div class="col-md-3 col-lg-2 pt5 pb5">
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">Persons</span>
                                                    <select name="total_persons" class="form-control"
                                                        v-on:change="updateRoomPersonCount(room, roomRowIndex, $event)">
                                                        <option value="0">0</option>
                                                        <option v-for="n in room.rate.total_people" :value="n">
                                                            {{ n }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                        </div>

                                    </div>







                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>
</template>

<script>
export default {

    props: ['destinations', "selected_destination", "from_date", "to_date", "entered_persons", "all_hotels"],

    data() {
        return {
            appCurrency: 'US',
            collapseOpen: false,
            hotels: [],
            bookedRooms: [],
            paymentSummary: [],

        }
    },

    methods: {
        openHotelRooms(hotel) {
            console.log(hotel)

            var hotelRooms = document.getElementById('hotelRooms-' + hotel.id)

            if (hotelRooms.classList.contains('in')) {
                hotelRooms.classList.remove('in')
            } else {
                hotelRooms.classList.add('in')
            }

        },

        updateRoomCount(room, e) {
            console.log(room, e.target.value)

            this.hotels.forEach(hotel => {


                if (hotel.id == room.hotel_id) {
                    hotel.rooms.forEach(hotelRoom => {
                        if (hotelRoom.id == room.id) {
                            hotelRoom.room_rows = []
                            for (let i = 0; i < e.target.value; i++) {
                                hotelRoom.room_rows.push({
                                    id: i,
                                    persons: hotelRoom.rate.total_people
                                })
                            }

                            console.log(hotelRoom.room_rows)
                        }
                    })
                }
            })

            console.log(this.hotels)




        },

        updateRoomPersonCount(room, roomRowIndex, e) {

            if (this.bookedRooms[room.hotel_id] == undefined) {
                this.bookedRooms[room.hotel_id] = []
            }

            if (this.bookedRooms[room.hotel_id][room.id] == undefined) {
                this.bookedRooms[room.hotel_id][room.id] = []
            }

            if (this.bookedRooms[room.hotel_id][room.id][roomRowIndex] == undefined) {
                this.bookedRooms[room.hotel_id][room.id][roomRowIndex] = []
            }

            this.bookedRooms[room.hotel_id][room.id][roomRowIndex] = {
                room_number: roomRowIndex + 1,
                persons: e.target.value,
                price_per_night: room.price_per_night,
                room_id: room.id,
            }

            roomRowIndex = roomRowIndex + 1

            // remove empty

            var totalRooms = 0;
            var totalPersons = 0;
            var totalAmount = 0;

            this.bookedRooms[room.hotel_id].forEach((room, roomIndex) => {
                console.log("room", room)
                totalRooms = totalRooms + room.length
                room.forEach((roomRow, roomRowIndex) => {
                    totalPersons = totalPersons + parseInt(roomRow.persons)
                    totalAmount = totalAmount + parseInt(roomRow.price_per_night)
                })


            })

            console.log("totalAmount", totalAmount)

            // set total rooms and persons in hotels array using array.splice

            this.hotels.splice(this.hotels.findIndex(hotel => hotel.id == room.hotel_id), 1, {
                ...this.hotels.find(hotel => hotel.id == room.hotel_id),
                total_selected_rooms: totalRooms,
                total_selected_persons: totalPersons,
                total_amount: totalAmount
            })


            console.log(this.bookedRooms[room.hotel_id])

            console.log("bookedRooms", this.bookedRooms)
        },

        submitBooking(hotel) {
            // console.log(hotel)
            console.log("hotelBookings", this.bookedRooms[hotel.id])


            var hotelBookings = this.bookedRooms[hotel.id]

            axios.post('/booking/store', {
                hotel_id: hotel.id,
                hotel_bookings: hotelBookings,
                from_date: this.from_date,
                to_date: this.to_date,
                destination_id: this.selected_destination,
            })
                .then(function (response) {
                    console.log(response);

                    if (response.data.status == 'success') {

                        console.log("success")

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: "Booking submitted successfully",
                        })

                    }

                })
                .catch(function (error) {
                    console.log(error);
                });

        }


    },

    mounted() {
        console.log('Component mounted.')

        console.log(this.destinations, this.selected_destination, this.from_date, this.to_date, this.entered_persons)

        this.hotels = this.all_hotels

        this.hotels.forEach(hotel => {
            this.bookedRooms[hotel.id] = []

            hotel.total_selected_rooms = 0
            hotel.total_selected_persons = 0
            hotel.total_amount = 0

        })


    }
}
</script>
