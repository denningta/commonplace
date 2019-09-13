<template>
        <ais-index :search-store="searchStorePosts">

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
                  <div class="row ml-2">
                    <ul class="list-group">
                      <li class="card-details">
                        <a class="harmony" target="_blank" href="https://www.amazon.com/gp/product/0060589469/ref=as_li_tl?ie=UTF8&tag=stenology-20&camp=1789&creative=9325&linkCode=as2&creativeASIN=0060589469&linkId=48fe482369b6fcefb1533ea811d23d74">
                          <ais-highlight :result="result" attribute-name="book_title"></ais-highlight>
                        </a>
                      </li>
                      <li class="card-details">
                        <ais-highlight :result="result" attribute-name="book_author"></ais-highlight>
                      </li>
                    </ul>
                  </div>
                    
                  </div>

                  <div class="mt-3 mb-2">
                    <ais-snippet :result="result" attribute-name="body"></ais-snippet>
                    <a :href="'posts/' + result.id">Show More</a>
                    <div class="row mt-3 ml-2">
                      <a href="#" class="badge badge-primary">
                        <ais-highlight :result="result" attribute-name="type"></ais-highlight>
                      </a>
                    </div>
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
const searchStorePosts = createFromAlgoliaCredentials(
    'DQPIAH2MXB', 
    'a23d936bcc0e34f892c7560d941a7234'
);

searchStorePosts.indexName = algoliaIndex;
console.log(searchStorePosts.indexName);

  export default {
    name: 'app',
    props: ['user_id'],
    mounted () {
        searchStorePosts.queryParameters = {filters: 'user_id: ' + this.user_id}
    },
    methods: {
      onPageChange(page) {
        window.scrollTo(0,0);
      }
    },
    data: function() {
      return {
        searchStorePosts,
      };
    },
  }

</script>