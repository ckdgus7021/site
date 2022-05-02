<!DOCTYPE html>
<html>
    <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"></script>
</head>

<script         >
$(function(){
    var rating = $('.review .rating');
    rating.each(function(){
        var targetScore = $(this)attr('data-rate');
        $(this).find('svg:nth-child(-n+' + targetScore + ')').css({color: '#F05522'});
    });
    var userScore = $('#makeStar');
    userScore.change(function(){
        var userScoreNum = $(this).val();
        $('.make_star svg:nth-child(n + ' + userScoreNum + ')').css({color:'#F05522'});
    });
});
</script>
<!--<style>
    .rating svg:nth-child(-n+3) {
        color: #F05522;
    }
</style>-->



<h2>별점 표시하기</h2>
<div class="review">
	<div class="rating" data-rate="3">
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>	
	</div>
	<div class="rating" data-rate="5">
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>	
	</div>
	<div class="rating" data-rate="2">
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>	
	</div>		
</div>

<hr>
<h2>별점주기</h2>
<div class="make_star">
	<select name="" id="makeStar">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select>
	<div class="rating" data-rate="3">
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>
		<i class="fas fa-star"></i>	
	</div>
</div>

</html>