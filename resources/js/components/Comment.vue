<template>
    <div>
        <div class="author">
            <div class="thumb">
                <a href="#0">
                    <img :src="avatar" alt="cast">
                </a>
            </div>
            <div class="movie-review-info">
                <span class="reply-date">{{posted_at}}</span>
                <h6 class="subtitle"><a href="#0">{{comment.author}} </a></h6>
                <span><i class="fas fa-check"></i> verified review</span>
            </div>
        </div>
        <div class="movie-review-content">
            <span>{{comment.content}}</span>
            
        </div>
    </div>
</template>

<script>
export default {
    name: "Comment",
    props: ['comment'],
    // console.log(this.comment.user.first_name)        // Huu Khanh
    computed: {
        avatar() {
            return `https://api.adorable.io/avatars/48/${this.comment.author}@adorable.io.png`;
        },
        posted_at() {
            return moment(this.comment.created_at).format('MMMM Do YYYY')
          },
    }

}
</script>
<style lang="scss" scoped>
      .comment-wrapper {
        list-style: none;
        text-align: left;
        overflow: hidden;
        margin-bottom: 2em;
        padding: .4em;

        .profile {
          width: 80px;
          float: left;
        }

        .msg-body {
          padding: .8em;
          color: #666;
          line-height: 1.5;
        }

        .msg {
          width: 86%;
          float: left;
          background-color: #fff;
          border-radius: 0 5px 5px 5px;
          position: relative;
          &::after {
            content: " ";
            position: absolute;
            left: -13px;
            top: 0;
            border: 14px solid transparent;
            border-top-color: #fff;
          }
        }

        .date {
          float: right;
        }
        .name {
          margin: 0;
          color: #999;
          font-weight: 700;
          font-size: .8em;
        }

        p:last-child {
          margin-top: .6em;
          margin-bottom: 0;
        }

      }


    </style>