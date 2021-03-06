<?php

namespace PragmaRX\TestsWatcher\Vendor\Laravel\Entities;

class Test extends Model
{
    protected $table = 'ci_tests';

    protected $fillable = [
		'suite_id',
        'path',
		'name',
		'state',
	];

	public function getFullPathAttribute($value)
	{
		return make_path([$this->suite->testsFullPath, $this->name]);
	}

	public function suite()
	{
		return $this->belongsTo('PragmaRX\TestsWatcher\Vendor\Laravel\Entities\Suite');
	}

	public function getTestCommandAttribute($value)
	{
		$command = $this->suite->testCommand;

		return $command . ' ' . $this->fullPath;
	}

	public function runs()
	{
		return $this->hasMany('PragmaRX\TestsWatcher\Vendor\Laravel\Entities\Run');
	}
}
