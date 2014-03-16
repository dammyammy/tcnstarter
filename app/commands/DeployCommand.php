<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Carbon\Carbon as Carbon;

class DeployCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'deploy:app';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Deploy the App to Production Server';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$to = $this->ask('Are you sure you want to deploy to Production? (Y/N)  ');

		if (strtoupper($to) == "Y"){
			$this->info('Deploying your App to Production Server please wait...');
			$this->info('++++++++++++++++++++++++++++++++++++++++++++++');

			$user = $this->ask('The Home Directory Name/ Username Only (/home/[username])');
			
			$file = $this->ask('Type name of zipped file & location eg. dami.tar.gz (Default Location = app directory)');
			$localFile = base_path().'/' . $file;
			
			$loc = $this->ask('Location On Production Server to move it to  eg. dami (Saved to /home/ogunmoy1/sites/ + entry)');
			$remotePath = '/home/' . $user. '/sites/'. $loc . '/' . $file ;

			$copiedtime = 'copied'. Str::slug(Carbon::now()->toDateTimeString()) .'.tar.gz';


			SSH::into('production')->put($localFile, $remotePath);

			SSH::into('production')->run(array(
					'cd sites/' . $loc,
					'tar xvzf '. $file,
					'mv ' . $file . ' archive/' . $copiedtime,
					'echo "APP DIRECTORY LISTING BELOW"',
					'echo "========================================"',
					'ls -al',
					'mv public/* ../../public/' . $loc . '/',
					'rm -rf public',
					'echo "PUBLIC DIRECTORY LISTING BELOW"',
					'echo "========================================"',
					'cd ../../public/' . $loc,
					'chmod -R a+rX *',
					'ls -al',
			));

			$this->info('++++++++++++++++++++++++++++++++++++++++++++++');
			$this->info('finished');

		} elseif (strtoupper($to) == "N"){
			$this->info('May Be Later then, Goodbye');
		}
		else{
			$this->info('Wrong Input!!!, Ending Now. Goodbye');
		}

	}

}
