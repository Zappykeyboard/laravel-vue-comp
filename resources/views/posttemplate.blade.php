<script type="text/x-template" id='post-box'>
  <div class="the-post">
    <div v-show="!showEditForm" class="post-content">
      <h2>@{{title}}</h2>
      <p>@{{author}}</p>
      <p v-show="content" >@{{content}}</p>
      <p v-show="likes" v-bind:class="heartIcon">@{{likes}}</p>
    </div>

    <div v-show="showEditForm" class="edit-area">
      <div class="">
        <label for="author">Edit Author: </label>
        <input type="text" name="title" v-model="postAuthor">
      </div>
      <div class="">
        <label for="title">Edit Title: </label>
        <input type="text" name="author" v-model="postTitle">
      </div>
      <div class="">
        <textarea cols='23' rows = '4' type="text" v-model="postContent"></textarea>
      </div>
    </div>
    <button @click="edit()" type="button" name="button">Edit post...</button>
    <hr>
  </div>


</script>

<script type="text/javascript">
  Vue.component('post-box',{
    template:'#post-box',
    data: function(){
      return {
        editField: '',
        postContent:this.content,
        postTitle: this.title,
        postAuthor: this.author,
        showEditForm: false
      }
    },
    props: {
      title: String,
      author: String,
      content: String,
      likes: Number
    },
    computed: {
      heartIcon(){
        return 'far';
      }

    },
    methods: {
      edit(){
        this.showEditForm = !this.showEditForm;
      }
    }
  })
</script>
