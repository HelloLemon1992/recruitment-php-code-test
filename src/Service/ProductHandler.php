<?php

namespace App\Service;

class ProductHandler
{
	public $products = [];

	public function setProducts($products){
		$this->products = $products;
	}

	public function getTotalPrice(){
		$totalPrice = 0;
		foreach($this->products as $p){
			$price = $p['price'] + 0;
			$totalPrice  += $price;
		}
		return $totalPrice;
	}

	public function getDessertAndSort(){
		return $this->productsTypeFilterAndSort('Dessert');
	}

	public function productsTypeFilterAndSort($filter){
		$pResult = $this->productsTypeFilter($filter);
		usort($pResult,function($a,$b){
			return $a['price'] < $b['price'];
		});

		return $pResult;
	}

	public function productsTypeFilter($filter){
		$productsResult = [];
		foreach($this->products as $p){
			if($p['type'] == $filter){
				$productsResult[] = $p;
			}
		}
		return $productsResult;
		
	}

	public function productsInfoTimeFormat(){
		foreach($this->products as $k=>$p){
			$this->products[$k]['create_at'] = strtotime($p['create_at']);
		}
	}
}