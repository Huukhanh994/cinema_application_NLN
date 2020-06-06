<template>
    <div>
        <div class="movie-review-item">
            <Comment v-if="film_id === comment.film_id" v-for="comment in comments" :key="comment.id" 
            :comment="comment">
            </Comment>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
    import Comment from './Comment'

    // export default {
    //     name: "Comments",
    //     components: {Comment},
    //     mounted() {
    //         this.$store.dispatch('GET_COMMENTS')


    //         // Enable pusher logging - don't include this in production
    //         Pusher.logToConsole = true;

    //         var pusher = new Pusher('98ac97eb3a9769d8e41e', {
    //             cluster: 'eu'
    //         });

    //         var channel = pusher.subscribe('comment-channel');
    //         channel.bind('new-comment', function(data) {
    //         app.messages.push(JSON.stringify(data));
    //         });

    //         //Subscribe to the channel we specified in our Adonis Application
    //         // let channel = pusher.subscribe('comment-channel')

    //         channel.bind('new-comment', (data) => {
    //             this.$store.commit('ADD_COMMENT', data.comment)
    //         })
    //     },
    //     computed: {
    //         ...mapGetters([
    //             'comments'
    //         ])
    //     }
    // }
    export default {
        name: "Comments",
        props: ['film_id'],
        components: {Comment},
        mounted() {
          this.$store.dispatch('GET_COMMENTS')

         //use your own credentials you get from Pusher
          let pusher = new Pusher(`98ac97eb3a9769d8e41e`, {
            cluster: `eu`,
            encrypted: false
          });

          //Subscribe to the channel we specified in our Adonis Application
          let channel = pusher.subscribe('comment-channel')

          channel.bind('new-comment', (data) => {
            this.$store.commit('ADD_COMMENT', data.comment)
          })
        },
        computed: {
          ...mapGetters([
            'comments'
          ])
        }
      }
</script>