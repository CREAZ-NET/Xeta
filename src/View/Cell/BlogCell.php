<?php
namespace App\View\Cell;

use Cake\View\Cell;

class BlogCell extends Cell {

/**
 * Display the sidebar on the blog pages.
 *
 * @return void
 */
	public function sidebar() {
		$this->loadModel('BlogCategories');
		$this->loadModel('BlogArticles');

		$articleSearch = $this->BlogArticles->newEntity($this->request->data);

		//Select all Categories.
		$categories = $this->BlogCategories
			->find()
			->select([
				'title',
				'slug',
				'article_count'
			])
			->all();

		//Select featured article.
		$featured = $this->BlogArticles
			->find()
			->select([
				'title',
				'slug',
				'created',
				'comment_count'
			])
			->contain([
				'Users' => function ($q) {
					return $q->find('short');
				}
			])
			->where([
				'BlogArticles.slug !=' => ($this->request->slug) ? $this->request->slug : '',
				'BlogArticles.is_display' => 1
			])
			->order([
				'BlogArticles.created' => 'desc'
			])
			->first();

		//Select all articles and group them by monthly.
		$archives = $this->BlogArticles
			->find('all')
			->select([
				'date' => 'DATE(created)',
				'count' => 'COUNT(*)'
			])
			->group('SUBSTR(DATE(created), 1, 7)')
			->order([
				'date' => 'desc'
			])
			->where([
				'is_display' => 1
			])
			->toArray();

		$this->set(compact('categories', 'featured', 'archives', 'articleSearch'));
	}
}
