<script type="text/x-template" id='post-box'>
  <div class="the-post">
    <h2>@{{title}}</h2>
    <p>@{{author}}</p>
    <p v-show="content && !isFocus('content')" @click="setFocus('content')">@{{content}}</p>
    <textarea v-show="isFocus('content')" cols='23' rows = '4' type="text" v-model="postContent"></textarea>
    <p v-show='likes' v-bind:class="heartIcon">@{{likes}}</p>
    <hr>
  </div>

</script>

<script type="text/javascript">
  Vue.component('post-box',{
    template:'#post-box',
    data: function(){
      return {
        editField: '',
        postContent:this.content
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

      setFocus(field){
        this.editField = field;
      },

      isFocus(field){
        return this.editField == field;
      }
    }
  })
</script>
