<template>
  <card create_link="adopt/save">
    <card-header>Blogs</card-header>
    <card-body>
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
                <th width="150px">Type</th>
                <th>Name</th>
                <th>Posted On</th>
            </thead>
            <tbody>
            <tr v-for="blog in blogs">
                <td>{{ blog_types[blog.type] }}</td>
                <td width="450px">
                    <router-link v-bind:to="'/blog/save/'+blog.blogId">{{ blog.title }}</router-link>
                </td>
                <td>{{ blog.posted_on | formatDate }}</td>
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
            blog_types: {},
            loading: true,
        }
    },
    created() {
      axios.get('api/blog')
        .then(response => {
          this.blogs = response.data.blogs;
          this.blog_types = response.data.blog_types;
          this.loading = false;
        })
        .catch(this.onError);
    },
    mixins: [FormMixin]

}
</script>