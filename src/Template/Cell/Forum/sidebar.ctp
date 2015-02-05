<?php if (!empty($staffOnline)): ?>
	<div class="sidebox widget">
		<div class="panel panel-forum panel-staff-online">
			<div class="panel-heading">
				<?= __("Staff Online") ?>
			</div>
			<div class="panel-body">
				<ul>
					<?php foreach ($staffOnline as $staff): ?>
						<li>
							<?= $this->Html->link(
								$this->Html->image($staff->user->avatar, ['class' => 'img-thumbnail']),
								['_name' => 'users-profile', 'slug' => $staff->user->slug, 'prefix' => false],
								['class' => 'avatar', 'escape' => false]
							) ?>
							<?= $this->Html->link(
								$staff->user->username,
								['_name' => 'users-profile', 'slug' => $staff->user->slug, 'prefix' => false],
								['class' => 'username']
							) ?>
							<small class="userGroup" style="<?= h($staff->user->group->css) ?>">
								<?= h($staff->user->group->name) ?>
							</small>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
<?php endif; ?>