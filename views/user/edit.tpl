<div class='data-edit container'>
	{if $user.id}
		<h2>{t}Edit user{/t}</h2>
	{else}
		<h2>{t}Register{/t}</h2>
	{/if}
	<form method='post' id='user_form' class='form-horizontal'>
		<input type='hidden' name='id' value='{$user.id}' />
		
		<div class='field-edit form-group'>
			<label for='username' class='col-lg-2 control-label'>{t}Username{/t}</label>
			<div class="col-lg-3">
				<input type='text' class='string required form-control' name='username' value='{$euser.username}' />
			</div>
		</div>
									
		<div class='field-edit form-group'>
			<label for='password' class='col-lg-2 control-label'>{t}Password{/t}</label>
			<div class="col-lg-3">
				<input type='password' class='string {if !$euser.id}required{/if} form-control' name='password' />
			</div>
		</div>
									
		<div class='field-edit form-group'>
			<label for='password2' class='col-lg-2 control-label'>{t}Repeat password{/t}</label>
			<div class="col-lg-3">
				<input type='password' class='string {if !$euser.id}required{/if} form-control' name='password2' />
			</div>
		</div>

		<div class='field-edit form-group'>
			<label for='email' class='col-lg-2 control-label'>{t}Email{/t}</label>
			<div class="col-lg-3">
				<input type='text' class='string required form-control' name='email' value='{$euser.email}' />
			</div>
		</div>
		
		<div class='buttons form-group'>
			<div class="col-lg-3 col-lg-offset-2">
				<input type="submit" class="btn btn-primary" name="submit" value="{t}Save{/t}" />
			</div>
		</div>
	</form>
</div>