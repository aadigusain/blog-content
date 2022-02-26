<div class="col-md-2 pr" >
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle visible-xs-block d-m-show" type="button" data-toggle="dropdown" id="dropdownMenu" >
   Menu
    <span class="caret"></span></button>
	<ul class="dropdown-menu list-group visible-lg-block">
		<li class="list-group-item active main-color-bg" ><a href="dashboard"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
		Dashboard 
		</a></li>		
		<li class="list-group-item"><a href="posts"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> &nbsp;Posts<span class="badge"><?php countpost($con); ?></span></a>
		</li><li class="list-group-item"><a href="categories" ><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp;Categories<span class="badge"><?php countcat($con); ?></span></a>
		<!--</li><li class="list-group-item"><a href="sub_categories" ><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> &nbsp;Sub Categories<span class="badge"><?php countsub($con); ?></span></a> -->
		</li><li class="list-group-item"><a href="tags" ><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp; Tags<span class="badge"><?php counttag($con); ?></span></a>
		</li><li class="list-group-item"><a href="users"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;Author <span class="badge"><?php countauthor($con); ?></span></a>
		
	<li class="list-group-item"><a href="cmt"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> &nbsp;Pending Comments <span class="badge"><?php countcmt($con); ?></span></a>
	</li><li class="list-group-item"><a href="photo"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> &nbsp;Upload Media <span class="badge"><?php //echo $user->totalUser(); ?></span></a>
	</li></ul>
</div>
</div>