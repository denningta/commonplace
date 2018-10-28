<template>
        <ais-index :search-store="searchStore">

        <ais-search-box></ais-search-box>

          <ais-results>
             <template slot-scope="{ result }">
              <div class="card p-3 m-2">
                <div class="blog-post">
                  <div class="row">
                    <div class="col-sm-11">

                      <h2 class="blog-post-title">
                        <a :href="'posts/' + result.id" class="href">
                        <ais-highlight :result="result" attribute-name="title"></ais-highlight>
                        </a>
                      </h2>

                    </div>

                      <div class="col-sm">
                        <a :href="'posts/' + result.id + '/edit'">
                          <i class="fas fa-edit"></i>
                        </a>
                      </div>

                  </div>
                  <p class="blog-post-meta"> 
                    <ais-highlight :result="result" attribute-name="created_at"></ais-highlight>
                  </p>
                  <p>
                    <a class="" data-toggle="collapse" :href="'#details' + result.id" role="button" aria-expanded="false" :aria-controls="'details' + result.id">
                      <span data-feather="plus-circle"></span> Show Details
                    </a>
                  </p>
                  <div class="collapse" :id="'details' + result.id">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        Card Type: <ais-highlight :result="result" attribute-name="type"></ais-highlight>
                      </li>
                      <li class="list-group-item">
                        Subject: <ais-highlight :result="result" attribute-name="subject"></ais-highlight>
                      </li>
                      <li class="list-group-item">
                        Book Title: <ais-highlight :result="result" attribute-name="book_title"></ais-highlight>
                      </li>
                      <li class="list-group-item">
                        Author: <ais-highlight :result="result" attribute-name="book_author"></ais-highlight>
                      </li>
                      <li class="list-group-item">
                        Page: {{ result.page }}
                      </li>
                    </ul>
                  </div>

                  <div class="mt-4 mb-2">
                    <!-- <ais-highlight :result="result" attribute-name="body"></ais-highlight> -->
                    <ais-snippet :result="result" attribute-name="body"></ais-snippet>
                    <a :href="'posts/' + result.id">Show More</a>
                  </div>

                </div>
              </div>
             </template>
          </ais-results>

          <ais-pagination
            class="pagination"
            :class-names="{
              'ais-pagination': 'pagination justify-content-center',
              'ais-pagination__item--active': 'active',
              'ais-pagination__item--disabled': 'disabled',
              'ais-pagination__link': 'page-link'
            }"
            v-on:page-change="onPageChange"
          />

          <ais-powered-by class="pb-4"></ais-powered-by>
      </ais-index>
</template>


<script>
import { createFromAlgoliaCredentials } from 'vue-instantsearch';
const searchStore = createFromAlgoliaCredentials(
    'DQPIAH2MXB', 
    'a23d936bcc0e34f892c7560d941a7234'
);

searchStore.indexName = process.env.MIX_ALGOLIA_INDEX;
console.log(process.env.MIX_ALGOLIA_INDEX);

  export default {
    name: 'app',
    props: ['user_id'],
    mounted () {
        searchStore.queryParameters = {filters: 'user_id: ' + this.user_id}
    },
    methods: {
      onPageChange(page) {
        window.scrollTo(0,0);
      }
    },
    data: function() {
      return {
        searchStore
      };
    },
  }

</script>