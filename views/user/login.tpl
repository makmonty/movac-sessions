<div id="login" class="container">
	<h2>{t}Login{/t}</h2>
	<form id="formLogin" class="form-horizontal" method="post">
		<div class="form-group">
			<label for="email" class="col-lg-2 control-label"><span>{t}Username{/t}</span></label>
			<div class="col-lg-3">
				<input type="text" name="username" id="username" tabindex="1" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-lg-2 control-label"><span>{t}Password{/t}</span></label>
			<div class="col-lg-3">
				<input type="password" name="password" id="password" tabindex="2" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-3 col-lg-offset-2">
				<!-- 
				<label class="checkbox">
					<input type="checkbox" name="remember" id="remember" tabindex="3" /> {t}Remember me{/t}
				</label>
				 -->
				<input type="submit" id="submit" name="submit" class="btn btn-primary" value="{t}Log in{/t}" tabindex="4" />
				<a class="btn btn-success" tabindex="5" href="{$base_url}user/edit{if $redirectTo}?redirectTo={$redirectTo|urlencode}{/if}"><span>{t}Join{/t}</span></a>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-3 col-lg-offset-2">
				<a id="recover_pass" tabindex="6" href="{$base_url}user/recover_password">{t}Forgot your password?{/t}</a>
			</div>
		</div>
	</form>
</div>