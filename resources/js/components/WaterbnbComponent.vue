<template>
    <div class="col-md-12">
      <a class="btn btn btn-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
        &#9727; Filters
      </a>
      <a class="btn btn btn-primary float-right" href="/listings/create" v-if="isLoggedIn">Add Your BNB <b>+</b></a>
      <br />
      <div class="collapse" id="collapseExample">
        <div class="card card-body" style="background-color:rgba(0, 0, 0, 0); border: none;">
          <div class="row">
            <div class="col-md-4" style=" margin: 2px;">
              <label class="mr-sm-2" for="inlineFormCustomSelect">Type of BNB:</label>
              <div class="filter">
              <label><input type="radio" checked v-on:change="onCheckboxChanged" v-model="selectedCategory" value="All"/> All</label>
              <label><input type="radio" v-on:change="onCheckboxChanged" v-model="selectedCategory" value="Private" /> Private</label>
              <label><input type="radio" v-on:change="onCheckboxChanged" v-model="selectedCategory" value="Shared" /> Shared</label>
              </div>
            </div>
            <div class="col" style=" margin: 2px;">
              <!--  -->
            </div>
            <div class="w-100"></div>
            <div class="col-md-4" style=" margin: 2px;">
              <form @submit.prevent="searchTitle()">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Specific BNB:</label>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">&#x1F50D;</span>
                  </div>
                  <input v-on:input="searchTitle" type="text" class="form-control" style="" v-model="search" aria-describedby="basic-addon1" placeholder="Search...">
                </div>

              </form>
            </div>
            <div class="col" style=" margin: 2px;">
              <!--  -->
            </div>
          </div>
        </div>
      </div><br />

        <!-- <input type="text" class="form-control" placeholder="Filter Your Search" style="margin-top: 25px"/> -->
        <div class="row">
          <div v-for="(listing, index) in listings.slice().reverse()">
          <div class="col-md-4">
            <div class="card text-white bg-dark mb-3" style="width: 340px; height: 35rem;  ">
              <div class="card-body">
                <h5 class="card-title text-center">{{ listing.title }}</h5>
                <p class="card-text">{{ listing.desc }}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item text-white bg-dark">{{ listing.rentor_name }} + {{ listing.id}}</li>
                <li class="list-group-item text-white bg-dark">{{ listing.type }}</li>
                <li class="list-group-item text-white bg-dark">{{ listing.location }}</li>
                <li class="list-group-item text-white bg-dark ">
                  <a :href="'/listings/' + listing.id + '/edit'" v-if="userId===listing.user_id" class="btn btn-warning float-left" style="margin-right: 5px;" role="button">Edit</a>
                  <button @click="deleteRoom(listing.id)"  name="delete" v-if="userId===listing.user_id" class="btn btn-danger float-left">Delete</button>
                  <h3 class="font-weight-bold text-right">RM{{ listing.price}}</h3>
                </li>
                <li class="text-white bg-dark ">
                  <a name="booknotloggedin" role="button" class="btn btn-success btn-block" href="/login" v-if="!isLoggedIn">Make A Booking</a> <!-- If Not Logged In -->
                  <a name="book" role="button" class="btn btn-success btn-block" href="#" v-if="isLoggedIn">Make A Booking</a> <!-- If Logged In -->
                </li>
              </ul>
            </div>

            </div>
          </div>
        </div>
    </div>
  <!-- End of For Loop -->
</template>

<script>

    export default {
      props:[
        "isLoggedIn",
        "userId"
      ],

      data: function() {
        return {
          listings: [],
          listing: {
            id: '',
            title: '',
            desc: '',
            price: '',
            type: '',
            location: '',
            user_id: '',
            rentor_name: ''
          },
          selectedCategory: '',
          search: ''
        };
      },

      mounted() {
        console.log('Component mounted.', this.isLoggedIn);
      },

      created(){
        this.fetchListings();
      },

      methods: {
        fetchListings: function(){
          axios.get('/listings', this.listing)
            .then(({ data }) => {
              this.listings = data;
            })
            .catch((err) => console.error(err));
        },
        onCheckboxChanged: function(){
          let type = this.selectedCategory;
          axios.get('/listings?type=' + type)
          .then(({ data }) => {
            this.listings = data;
          }, (error) => {
            console.log(error);
          });
        },
        searchTitle: function(){
          let title = this.search;
          let type = this.selectedCategory;
          axios.get('/listings?title=' + title + "&type=" + type)
          .then(({data}) => {
            this.listings = data;
          });
        },
        deleteRoom: function(id) {
          axios.delete('/listings/' + id)
          .then((response) => {
          this.fetchListings();
        })
        .catch((err) => console.error(err));
        },
      },


    }
</script>
