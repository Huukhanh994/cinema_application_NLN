<template>
      <div id="commentForm" class="box has-shadow has-background-white">

        <form @keyup.enter="postComment">
          <div class="field has-margin-top">

            <div class="field has-margin-top">
              <label class="label">Your name</label>
              <div class="control">
                <input type="text" placeholder="Your name" class="input is-medium" v-model="comment.author">
              </div>
              

            </div>
            <div class="field has-margin-top">
              <label class="label">Your comment</label>
              <div class="control">
                            <textarea
                              style="height:100px; color:black;"
                              name="comment"
                              class="input is-medium" autocomplete="true" v-model="comment.content"
                              placeholder="lorem ipsum"></textarea>
              </div>

            </div>
            <input type="hidden" placeholder="Your name" class="input is-medium" v-bind:film_id="comment.film_id">
            <div class="control has-margin-top">
              <button style="background-color: #47b784" :class="{'is-loading': submit}"
                      class="button has-shadow is-medium has-text-white"
                      :disabled="!isValid"
                      @click.prevent="postComment"
                      type="submit"> Submit
              </button>
            </div>
          </div>
        </form>
        <br>
      </div>
    </template>

    <script>
      export default {
        name: "NewComment",
        props: ['film_id'],
        data() {
          return {
            submit: false,
            comment: {
              content: '',
              author: '',
              film_id: this.film_id
            }
          }
        },
        methods: {
          postComment() {
            this.submit = true;
            this.$store.dispatch('ADD_COMMENT', this.comment)
              .then(response => {
                this.submit = false;
                if (response.data === 'ok')
                  console.log('Add comment successfully!')
                  this.comment.author = ''
                  this.comment.content = ''
                  this.$swal("Success! Add comment successfully!", {
                      icon: "success",
                  });
              }).catch(err => {
              this.submit = false
            })

          },
        },
        computed: {
          isValid() {
            return this.comment.content !== '' && this.comment.user !== ''
          }
        }
      }
    </script>

    <style scoped>
      .has-margin-top {
        margin-top: 15px;
      }

    </style>