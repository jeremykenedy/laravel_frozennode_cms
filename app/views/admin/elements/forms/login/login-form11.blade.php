<style type="text/css">

@import url(http://weloveiconfonts.com/api/?family=brandico|entypo|openwebicons|zocial);

/* brandico */
[class*="brandico-"]:before {
  font-family: 'brandico', sans-serif;
}

/* entypo */
[class*="entypo-"]:before {
  font-family: 'entypo', sans-serif;
}

/* openwebicons */
[class*="openwebicons-"]:before {
  font-family: 'OpenWeb Icons', sans-serif;
}

/* zocial */
[class*="zocial-"]:before {
  font-family: 'zocial', sans-serif;
}

.form-signin{
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}


.login-input {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.login-input-pass {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


.signup-input {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

.signup-input-confirm {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}



.create-account {
  text-align: center;
  width: 100%;
  display: block;
}

.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.btn-center{
  width: 50%;
  text-align: center;
  margin: inherit;
}

.social-login-btn {
  margin: 5px;
  width: 20%;
  font-size: 250%;
  padding: 0;
}

.social-login-more {
  width: 45%;
}

.social-google {
  background-color: #da573b;
  border-color: #be5238;
}
.social-google:hover{
  background-color: #be5238;
  border-color: #9b4631;
}

.social-twitter {
  background-color: #1daee3;
  border-color: #3997ba;
}
.social-twitter:hover {
  background-color: #3997ba;
  border-color: #347b95;
}

.social-facebook {
  background-color: #4c699e;
  border-color: #47618d;
}
.social-facebook:hover {
  background-color: #47618d;
  border-color: #3c5173;
}

.social-linkedin {
  background-color: #4875B4;
  border-color: #466b99;
}
.social-linkedin:hover {
  background-color: #466b99;
  border-color: #3b5a7c;
}

</style>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">

<div class="container">
      
      <script id="metamorph-1-start" type="text/x-placeholder"></script><script id="metamorph-21-start" type="text/x-placeholder"></script>

	<div class="container text-center">
	    <form class="form-signin" data-ember-action="2">
	    	<h2 class="form-signin-heading">Sign in</h2>

			<small class="text-muted">Connect [your service] with your favorite social network</small>
			<br><br>

			
<p>
<a class="btn btn-primary social-login-btn social-facebook" href="/auth/facebook"><i class="fa fa-facebook"></i></a>
<a class="btn btn-primary social-login-btn social-twitter" href="/auth/twitter"><i class="fa fa-twitter"></i></a>
</p>
<p>
<a class="btn btn-primary social-login-btn social-linkedin" href="/auth/linkedin"><i class="fa fa-linkedin"></i></a>
<a class="btn btn-primary social-login-btn social-google" href="/auth/google"><i class="fa fa-google-plus"></i></a>
</p>

<div class="btn-group social-login-more">
  <button type="button" class="btn btn-default dropdown-toggle btn-block" data-toggle="dropdown">
    More...
  </button>
  <ul class="dropdown-menu text-left " role="menu">
    <li><a href="#"><i class="fa fa-tumblr-sign"></i>   Tumblr</a></li>
    <li><a href="#"><i class="fa fa-github-alt"></i>   Github</a></li>
    <li><a href="#"><i class="fa fa-dropbox"></i>   Dropbox</a></li>
    <li><a href="/auth/amazon"><span class="zocial-amazon"></span>   Amazon</a></li>
    <li><a href="#"><span class="zocial-bitbucket"></span>   Bitbucket</a></li>
    <li><a href="#"><span class="zocial-evernote"></span>   Evernote</a></li>
    <li><a href="#"><span class="zocial-meetup"></span>   Meetup</a></li>
    <li><a href="#"><i class="fa fa-windows"></i>   Windows Live</a></li>
    <li><a href="#"><i class="fa fa-weibo"></i>   Weibo</a></li>
    <li><a href="#"><i class="fa fa-foursquare"></i>   Foursquare</a></li>
    <li><a href="#"><i class="fa fa-stackexchange"></i>   Stack Exchange</a></li>
    <li><a href="#"><i class="fa fa-trello"></i>   Trello</a></li>
    <li><a href="#"><span class="zocial-wordpress"></span>   Wordpress</a></li>
  </ul>
</div>
<br><br>


		    <small class="text-muted">Or sign in with [your service]</small>
		    <br><br>
	    	
	        <input id="ember360" class="ember-view ember-text-field form-control login-input" placeholder="Email Address" type="text">
	        <input id="ember361" class="ember-view ember-text-field form-control login-input-pass" placeholder="Password" type="password">

	        <script id="metamorph-22-start" type="text/x-placeholder"></script><script id="metamorph-22-end" type="text/x-placeholder"></script>

	        <button class="btn btn-lg btn-primary btn-block btn-center" type="submit" data-bindattr-3="3">Sign in</button>
	        <br>
	        <small class="create-account text-muted">Dont have a [your service] or social network account? <button id="ember363" class="ember-view btn btn-sm btn-default"> Sign Up </button> </small>
	    </form>
    </div>