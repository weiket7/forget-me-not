<template>
  <card create_link="adopt/save">
    <card-header>Dogs</card-header>
    <card-body>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
            <tr>
              <th width="50px">#</th>
              <th width="80px">Status</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Age</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="adopt in filteredAdopts">
              <td>{{ adopt.adoptId }}</td>
              <td>{{ adopt_stats[adopt.stat] }}</td>
              <td width="450px">
                <router-link v-bind:to="'/adopt/save/'+adopt.adoptId">{{ adopt.name }}</router-link>
              </td>
              <td>{{ adopt.gender | showGender  }}</td>
              <td>{{ adopt.age}}</td>
            </tr>
            </tbody>
          </table>
        </div>
    </card-body>
  </card>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "adopt-list",
    data() {
      return {
        selectedStatus: null,
        filteredAdopts: [],
        adopts: [],
        adopt_stats: {},
        loading: true,
      }
    },
    methods: {
      filterAdopts(selectedStatus) {
        if(selectedStatus === 'All') {
          this.filteredAdopts = this.adopts;
          return;
        }
        this.filteredAdopts = this.adopts.filter((adopt) => {
          return adopt.stat === selectedStatus;
        });
      }
    },
    created() {
      axios.get('api/adopt')
        .then(response => {
          this.adopts = response.data.adopts;
          this.filteredAdopts = response.data.adopts;
          this.adopt_stats = response.data.adopt_stats;
          this.loading = false;
        })
        .catch(error => {
          console.log(error);
        })
    },
  }
</script>

<style scoped>

</style>