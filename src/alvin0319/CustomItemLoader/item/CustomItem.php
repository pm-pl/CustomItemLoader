<?php

/*
 *    ____          _                  ___ _                 _                    _
 *   / ___|   _ ___| |_ ___  _ __ ___ |_ _| |_ ___ _ __ ___ | |    ___   __ _  __| | ___ _ __
 *  | |  | | | / __| __/ _ \| '_ ` _ \ | || __/ _ \ '_ ` _ \| |   / _ \ / _` |/ _` |/ _ \ '__|
 *  | |__| |_| \__ \ || (_) | | | | | || || ||  __/ | | | | | |__| (_) | (_| | (_| |  __/ |
 *   \____\__,_|___/\__\___/|_| |_| |_|___|\__\___|_| |_| |_|_____\___/ \__,_|\__,_|\___|_|
 *
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 */

declare(strict_types=1);

namespace alvin0319\CustomItemLoader\item;

use InvalidArgumentException;
use pocketmine\block\Block;
use pocketmine\item\Item;

class CustomItem extends Item{
	/** @var int */
	protected $maxStackSize = 64;
	/** @var float */
	protected $miningSpeed = 1;

	public function __construct(int $id, int $meta = 0, string $name = "Unknown", int $maxStackSize = 64, float $miningSpeed = 1){
		parent::__construct($id, $meta, $name);
		$this->maxStackSize = $maxStackSize;
		if($miningSpeed <= 0){
			throw new InvalidArgumentException("Mining speed must larger than 0");
		}
		$this->miningSpeed = $miningSpeed;
	}

	public function getMaxStackSize() : int{
		return $this->maxStackSize;
	}

	public function getMiningEfficiency(Block $block) : float{
		return $this->miningSpeed;
	}
}