<template>
  <form @submit.prevent="onSubmit()">
    <card>
      <card-header>
        {{ isCreate ? 'Add Dog' : 'Update Dog' }}
      </card-header>
      <card-body>
        <modal
          id="modal-delete"
          type="delete"
          :submitEvent="deleteAdopt"
        >Are you sure about deleting {{ adopt.name}}?</modal>

        <div class="form-group row">
          <div class="col-md-6">
              <label-component required>Name</label-component>
              <textbox-component v-model="adopt.name"></textbox-component>
            <input-error :error="errors.get('name')" />
          </div>

          <div class="col-md-6">
            <label-component required>Status</label-component>
            <radio-component
              v-model="adopt.stat"
              :options="{ 'A': 'Available', 'D': 'Adopted' }"
              :error="errors.get('stat')"
              v-if="!isCreate"
            ></radio-component>
            <static-text v-else>Available</static-text>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label-component required>Gender</label-component>
            <radio-component
              v-model="adopt.gender"
              :options="{ 'M': 'Male', 'F': 'Female' }"
              :error="errors.get('gender')"
            ></radio-component>
            <input-error :error="errors.get('gender')" />
          </div>

          <div class="col-md-6">
            <label-component required>Birthday</label-component>
            <datepicker-component
              name="birthday"
              v-model="adopt.birthday"
              :error="errors.get('birthday')"
              :months="true"
              v-if="loaded"
            ></datepicker-component>
            <input-error :error="errors.get('birthday')" />
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label-component required>Breed</label-component>
            <textbox-component v-model="adopt.breed" :error="errors.get('breed')"></textbox-component>
            <input-error :error="errors.get('breed')" />
          </div>

          <div class="col-md-6">
            <label-component>Colour</label-component>
            <textbox-component v-model="adopt.colour" :error="errors.get('colour')"></textbox-component>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label-component>Weight</label-component>
            <textbox-component v-model="adopt.weight" :error="errors.get('weight')"></textbox-component>
          </div>

          <div class="col-md-6">
            <label-component>HDB Approved</label-component>
            <radio-component
              v-model="adopt.hdb"
              :options="{ 1: 'Yes', 0: 'No' }"
              :error="errors.get('hdb')"
            ></radio-component>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label-component>Microchipped</label-component>
            <radio-component
              v-model="adopt.microchip"
              :options="{ 1: 'Yes', 0: 'No' }"
              :error="errors.get('microchip')"
            ></radio-component>
          </div>

          <div class="col-md-6">
            <label-component>Vaccinated</label-component>
            <radio-component v-model="adopt.vaccinate" :options="{ 1: 'Yes', 0: 'No' }"></radio-component>
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <label-component>Sterilised</label-component>
            <radio-component
              v-model="adopt.sterilise"
              :options="{ 1: 'Yes', 0: 'No' }"
              :error="errors.get('sterilise')"
            ></radio-component>
          </div>

          <div class="col-md-6">
            <label-component>Description <small>(max 2000 characters)</small></label-component>
            <textarea-component :rows="7" v-model="adopt.desc" :error="errors.get('desc')" :maxlength="2000"></textarea-component>
          </div>
        </div>

        <div class="form-group row" v-if="isCreate">
          <div class="col-md-12">
            <div class="alert alert-secondary">
                Complete saving information before adding images and/or video
              </div>
          </div>
        </div>

        <div class="form-group row" v-if="!isCreate">
          <div class="col-md-6">
            <div>
              <label-component>Short Video <small>(max 128 mb)</small></label-component><br>
              <input type="file" @input="uploadVideo"/>
              <div class="spinner-border" role="status" v-if="videoUploading">
                <span class="sr-only">Loading...</span>
              </div><br>
              <video width="320" height="200" controls v-if="adopt.video && loaded">
                <source :src="baseUrl+'/videos/'+adopt.video">
                Your browser does not support the video tag.
              </video><br>

              <button class="btn btn-secondary" type="button" @click="deleteVideo" v-if="adopt.video && loaded">Delete Video</button>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label-component required>
                Image 1
                <small>(default, max size 1mb)</small>
              </label-component><br>
              
              <image-input name="image1" folder="adopts" v-model="adopt.image1" v-if="loaded" :maxMb="1" @input="uploadImage($event, 1)"/>
            </div>
          </div>
        </div>

        <div class="form-group row" v-if="!isCreate">
          <div class="col-md-6">
            <label-component required>
              Image 2
              <small>(max size 1mb)</small>
            </label-component><br>
            
            <image-input name="image2" folder="adopts" v-model="adopt.image2" v-if="loaded" :maxMb="1" canRemove 
              @delete="deleteImage(2)"
              @input="uploadImage($event, 2)"/>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label-component required>
                Image 3
                <small>(max size 1mb)</small>
              </label-component><br>
              
              <image-input name="image3" folder="adopts" v-model="adopt.image3" v-if="loaded" :maxMb="1" canRemove 
                @delete="deleteImage(3)"
                @input="uploadImage($event, 3)"/>
            </div>
          </div>
        </div>

        <div class="form-group row" v-if="!isCreate">
          <div class="col-md-6">
            <label-component required>
              Image 4
              <small>(max size 1mb)</small>
            </label-component><br>
            
            <image-input name="image4" folder="adopts" v-model="adopt.image4" v-if="loaded" :maxMb="1" canRemove 
              @delete="deleteImage(4)"
              @input="uploadImage($event, 4)"/>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label-component required>
                Image 5
                <small>(max size 1mb)</small>
              </label-component><br>
              
              <image-input name="image5" folder="adopts" v-model="adopt.image5" v-if="loaded" :maxMb="1" canRemove 
                @delete="deleteImage(4)"
                @input="uploadImage($event, 5)"/>
            </div>
          </div>
        </div>

      </card-body>
      <form-footer>
        <button type="submit" class="btn btn-success">Save</button>
        <button
          type="button"
          class="btn btn-danger"
          data-toggle="modal"
          data-target="#modal-delete"
          v-if="!this.isCreate"
        >Delete</button>
      </form-footer>
    </card>
  </form>
</template>

<script>
import axios from "axios";
import FormMixin from "../form-mixin";
import ImageInput from "../components/ImageInput"

export default {
  name: "adopt",
  data() {
    return {
      adopt: { breed: "Cross Breed" },
      imageNew: null,
      baseUrl: window.baseUrl,
      videoUploading: false,
    };
  },
  computed: {
    isCreate() {
      return this.$route.path == "/adopt/save";
    }
  },
  methods: {
    uploadVideo(e) {
      var video = e.target.files[0];
      //console.log(video.size);
      if(video.size > 1024*1024*128) {
        toastr.error("Video must be <128mb");
        return;
      }

      var formData = new FormData();
      formData.append("adoptId", this.adopt.adoptId);
      formData.append("video", video);

      var config = {
        headers: {
          "content-type": "multipart/form-data"
        }
      };

      this.videoUploading = true;

      axios
        .post('api/adopt/upload-video', formData, config)
        .then(response => {
          this.videoUploading = false;
          toastr.success("Video added");
          this.adopt.video = response.data.name;
        })
        .catch(this.onError);
    },
    deleteVideo() {
      const data = {
        adoptId: this.adopt.adoptId,
      }
      axios
        .post('api/adopt/delete-video', data)
        .then(response => {
          toastr.success("Video deleted");
          this.adopt.video = null;
        })
        .catch(this.onError);
    },
    uploadImage(image, imageNumber) {
      if(image.size > 1024*1024*1) {
        toastr.error("Image must be <1mb");
        return;
      }

      var formData = new FormData();
      formData.append("adoptId", this.adopt.adoptId);
      formData.append("imageNumber", imageNumber);
      formData.append("image", image);

      var config = {
        headers: {
          "content-type": "multipart/form-data"
        }
      };

      axios
        .post('api/adopt/upload-image', formData, config)
        .then(response => {
          toastr.success("Image added");
        })
        .catch(this.onError);
    },
    deleteImage(imageNumber) {
      const data = {
        adoptId: this.adopt.adoptId,
        imageNumber: imageNumber
      }
      axios
        .post('api/adopt/delete-image', data)
        .then(response => {
          toastr.success("Image deleted");
        })
        .catch(this.onError);
    },
    onSubmit() {
      let url = "api/adopt/save";
      if (!this.isCreate) {
        url += "/" + this.$route.params.adoptId;
      }

      axios
        .post(url, this.adopt)
        .then(this.onSuccess)
        .catch(this.onError);
    },
    onSuccess(response) {
      this.errors.clear();
      if (this.isCreate) {
        toastr.success("Dog added");
        this.adopt.adoptId = response.data;
        this.$router.push("/adopt/save/" + this.adopt.adoptId);
        return;
      }
      toastr.success("Dog updated");
    },
    updateImage(file) {
      this.imageNew = file;
    },
    deleteAdopt() {
      axios
        .post(
          "api/delete-record?table=adopt&column=adoptId&id=" +
            this.$route.params.adoptId
        )
        .then(response => {
          toastr.success("Dog deleted");
          this.$router.push("/adopt");
        })
        .catch(this.onError);
    }
  },
  created() {
    if (!this.isCreate) {
      axios
        .get("api/adopt/get/" + this.$route.params.adoptId)
        .then(response => {
          this.adopt = response.data.adopt;
          this.loaded = true;
        })
        .catch(error => {
          console.log(error);
        });
    } else {
      this.adopt.stat = "A";
      this.loaded = true;
    }
  },
  mixins: [FormMixin],
  components: {
    ImageInput
  }
};
</script>

<style scoped>
</style>