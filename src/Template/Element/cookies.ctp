<div class="cookies">
	<p>
		<?= __("Cookies ensure the proper functioning of the site. By using this site, you accept the use of cookies.") ?>
		<?= $this->Html->link(
			__("{0} I understood.", '<i class="fa fa-check"></i>'),
			'#',
			[
				'class' => 'btn btn-sm btn-primary closeCookies',
				'data-url' => $this->Url->build(['controller' => 'pages', 'action' => 'acceptCookie']),
				'escape' => false
			]
		) ?>
	</p>
</div>
