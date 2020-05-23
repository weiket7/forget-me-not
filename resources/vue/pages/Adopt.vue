<template>
  <card>
    <card-header>
      {{ is_create ? 'Add Dog' : 'Update Dog' }}
    </card-header>
    <card-body>
      <form @submit.prevent="onSubmit()">
      <div class="row">
        <div class="col-md-6">
          
          <div class='form-group'>
            <label-component required>Name</label-component>
            <textbox-component v-model="adopt.name" :error="errors.get('name')"></textbox-component>
          </div>

          <div class="form-group">
            <label-component required>Gender</label-component>
            <radio-component v-model="adopt.gender" :options="{ 'M': 'Male', 'F': 'Female' }" :error="errors.get('gender')"></radio-component>
          </div>

          <div class="form-group">
            <label-component required>Breed</label-component>
            <textbox-component v-model="adopt.breed" :error="errors.get('breed')"></textbox-component>
          </div>

          <div class="form-group">
            <label-component>HDB Approved</label-component>
              <radio-component v-model="adopt.hdb" :options="{ 1: 'Yes', 0: 'No' }" :error="errors.get('hdb')"></radio-component>
          </div>

          <div class="form-group">
            <label-component>Vaccinated</label-component>
            <radio-component v-model="adopt.vaccinate" :options="{ 1: 'Yes', 0: 'No' }"></radio-component>
          </div>

          <div class="form-group">
            <label-component>Description</label-component>
            <textarea-component :rows="7" v-model="adopt.desc" :error="errors.get('desc')"></textarea-component>
          </div>
        </div>

        <div class="col-md-6">
          <div class='form-group'>
            <label-component required>Status</label-component>
            <radio-component v-model="adopt.stat" :options="{ 'A': 'Available', 'D': 'Adopted' }" :error="errors.get('stat')" v-if="!is_create"></radio-component>
            <static-text v-else>Available</static-text>
          </div>

          <div class="form-group">
            <label-component required>Birthday</label-component>
            <datepicker-component name="birthday" v-model="adopt.birthday" :error="errors.get('birthday')" :months="true" v-if="loaded"></datepicker-component>
          </div>

          <div class="form-group">
            <label-component>Colour</label-component>
            <textbox-component v-model="adopt.colour" :error="errors.get('colour')"></textbox-component>
          </div>

          <div class="form-group">
            <label-component>Microchipped</label-component>
            <radio-component v-model="adopt.microchip" :options="{ 1: 'Yes', 0: 'No' }" :error="errors.get('microchip')"></radio-component>
          </div>

          <div class="form-group">
            <label-component>Sterilised</label-component>
            <radio-component v-model="adopt.sterilise" :options="{ 1: 'Yes', 0: 'No' }" :error="errors.get('sterilise')"></radio-component>
          </div>

          <div class="form-group">
            <label-component required>Image 1</label-component>
            <image-component v-model="adopt.image" name="image"
                            v-on:update-image="updateImage" folder="adopts"
                            :src="adopt.image" :error="errors.get('image_new')"></image-component>
          </div>
        </div>
      </div>
    </form>
    </card-body>
    <form-footer>
      <button type="submit" class="btn btn-success">Save</button>
      <button type="button" class="btn btn-danger" data-toggle="confirmation" v-if="!this.is_create">Delete</button>
    </form-footer>
  </card>
</template>

<script>
  import axios from 'axios'
  import ImageComponent from "../components/ImageComponent";
  import FormMixin from "../form-mixin";
  import Label from '../components/Label'
  import StaticText from '../components/StaticText'
  import Portlet from '../components/Portlet'
  import Textbox from '../components/Textbox'
  import Textarea from '../components/Textarea'
  import Radio from '../components/Radio'
  import Card from '../components/Card'
  import CardHeader from '../components/CardHeader'
  import CardBody from '../components/CardBody'
  import CardFooter from '../components/CardFooter'
  import Datepicker from '../components/Datepicker'
  
  export default {
    name: "adopt",
    data() {
      return {
        adopt: { breed: "Local Cross"},
        rescuers: [{}],
        fosters: [{}],
        adopters: [{}],
        image_new: null,
      }
    },
    computed: {
      is_create() {
        return this.$route.path == "/adopt/save";
      },
      location_options() {
        let options = ['ARC', "The Animal Lodge", "Others"];
        for (let i=0; i<this.adopters.length; i++) {
          options.push("Adopter " + this.adopters[i].name);
        }
        for (let i=0; i<this.rescuers.length; i++) {
          options.push("Rescuer " + this.rescuers[i].name);
        }
        for (let i=0; i<this.fosters.length; i++) {
          options.push("Foster " + this.fosters[i].name);
        }
        return options;
      }
    },
    methods: {
      onSubmit() {
        let url = 'api/adopt/save';
        if (!this.is_create) {
          url += '/'+ this.$route.params.adopt_id
        }
  
        let form_data = this.adopt;
        console.log(form_data);
        let config = {};
        if (this.image_new) {
          form_data = new FormData();
          this.appendObjectToFormData(this.adopt, form_data);
          form_data.append("image_new", this.image_new);
    
          config = {
            headers: {
              'content-type': 'multipart/form-data'
            }
          };
        }
  
        console.log(form_data);
        console.log(config);
  
        axios.post(url, form_data, config)
          .then(this.onSuccess)
          .catch(this.onError);
      },
      onSuccess(response) {
        this.errors.clear();
        if (this.is_create) {
          toastr.success("Dog added");
          this.adopt.adopt_id = response.data;
          this.$router.push('/adopt/save/'+this.adopt.adopt_id);
          return;
        }
        toastr.success("Dog updated");
      },
      updateImage(file) {
        this.image_new = file;
      },
      deleteAdopt() {
        axios.post('api/adopt/delete/'+this.$route.params.adopt_id)
          .then(response => {
            toastr.success("Adopt deleted");
            this.$router.push('/adopt');
          })
          .catch(this.onError);
      },
      copy() {
        document.getElementById("importIntoAdoptadog").select();
        document.execCommand("copy");
      }
    },
    created() {
      if (! this.is_create) {
        axios.get('api/adopt/get/' + this.$route.params.adopt_id)
          .then(response => {
            this.adopt = response.data.adopt;
            this.loaded = true;
          })
          .catch(error => { console.log(error); })
      } else {
        this.adopt.stat = 'A';
        this.loaded = true;
      }
    },
    mounted() {
      let vue = this
      $('[data-toggle=confirmation]').confirmation({
        rootSelector: '[data-toggle=confirmation]',
      }).on("confirmed.bs.confirmation", function() {
        vue.deleteAdopt();
      });
    },
    components: {
      'label-component': Label,
      'image-component': ImageComponent,
      'static-text': StaticText,
      'single-portlet': Portlet,
      'textbox-component': Textbox,
      'textarea-component': Textarea,
      'radio-component': Radio,
      'form-footer': CardFooter,
      'datepicker-component': Datepicker,
      'card': Card,
      'card-header': CardHeader,
      'card-body': CardBody,
      'card-footer': CardFooter,
    },
    mixins: [FormMixin]
  }
</script>

<style scoped>

</style>