$('.like').on('click', function(event) {
event.preventDefault();
var postid=event.target.parentNode.dataset['postid'];
var islike = event.target.previousElementSibling == null? true:false;
console.log(islike);
$.ajax({
  method: 'POST',
  url: like,
  data: { islike: islike, postid: postid , _token: token}
})
.done(function(){
event.target.innerText= islike ?event.target.innerText=='Like'?'You like  it':'Like':event.target.innerText=='Dislike'?'You disliked the post':'Dislike';
if(islike){
  event.target.nextElementSibling.innerText ='Dislike'
}else{
  event.target.previousElementSibling.innerText ='Like'

}
});
});
