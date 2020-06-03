<template>
  <card>
    <card-header>
      Blogs
      <template v-slot:toolbar>
        <router-link to="blog/save">
          <button class="btn btn-primary">Add</button>
        </router-link>
      </template>
    </card-header>
    <card-body>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
                <th width="100px">Type</th>
                <th>Name</th>
                <th>Featured on home</th>
                <th>Posted On</th>
            </thead>
            <tbody>
            <tr v-for="blog in blogs" :key="blog.blogId">
                <td>{{ blogTypes[blog.type] }}</td>
                <td width="450px">
                    <router-link v-bind:to="'/blog/save/'+blog.blogId">{{ blog.title }}</router-link>
                </td>
                <td>{{ blog.isFeatured ? "Yes" : "No" }}</td>
                <td>{{ blog.postedOn | formatDate }}</td>
            </tr>
            </tbody>
          </table>
        </div>
    </card-body>
  </card>
</template>

<script>
import axios from 'axios';
import TextEditor from '../components/TextEditor'
import FormMixin from "../form-mixin";

export default {
    name: "BlogList",
    data() {
        return {
            blogs: [],
            blogTypes: {},
            loading: true,
        }
    },
    created() {
      axios.get('api/blog')
        .then(response => {
          this.blogs = response.data.blogs;
          this.blogTypes = response.data.blogTypes;
          this.loading = false;
        })
        .catch(this.onError);
    },
    mixins: [FormMixin]

}
</script>