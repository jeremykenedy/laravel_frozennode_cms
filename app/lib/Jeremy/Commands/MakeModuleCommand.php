<?php namespace Jeremy\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\File;

class MakeModuleCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'jeremy:module';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new Jeremy CMS module.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	private function replaceModelNames($strSubject,$up,$lp,$us,$ls){
		$strSubject = str_replace('[UPPER_PLURAL_REPLACE]',$up,$strSubject);
		$strSubject = str_replace('[LOWER_PLURAL_REPLACE]',$lp,$strSubject);
		$strSubject = str_replace('[UPPER_SINGULAR_REPLACE]',$us,$strSubject);
		$strSubject = str_replace('[LOWER_SINGULAR_REPLACE]',$ls,$strSubject);
		return $strSubject;
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$strPublicDir = public_path();
		$strAppDir = app_path();
		$strModuleTemplateDir = $strAppDir.'/module_templates';
		$up = $this->argument('upper_plural_name');
		$lp = $this->argument('lower_plural_name');
		$us = $this->argument('upper_singular_name');
		$ls = $this->argument('lower_singular_name');

		# Create migration
		// ./artisan --env=tim migrate:make 'create_'$NEW_LOWER_PLURAL'_table'
		$this->info('Generating migration...');
		$this->call('migrate:make',array('name'=>"create_{$lp}_table"));
		$this->info('Migration generated.');

		# Edit migration
		// vim `find -name '*create_'$NEW_LOWER_PLURAL'_table.php'`

		# Update autoload
		// php ~/Programs/composer.phar dumpautoload

		# Test migration and rollback
		// ./artisan --env=tim migrate
		// ./artisan --env=tim migrate:rollback

		# Run migration
		// ./artisan --env=tim migrate

		# Copy files from old modules
		$this->info('Generating module admin files...');
		file_put_contents("$strAppDir/models/$us.php",$this->replaceModelNames(file_get_contents("$strModuleTemplateDir/app/models/model.php"),$up,$lp,$us,$ls));
		file_put_contents("$strAppDir/models/{$us}Photo.php",$this->replaceModelNames(file_get_contents("$strModuleTemplateDir/app/models/model_photo.php"),$up,$lp,$us,$ls));
		file_put_contents("$strAppDir/controllers/admin/{$us}Controller.php",$this->replaceModelNames(file_get_contents("$strModuleTemplateDir/app/controllers/admin/controller.php"),$up,$lp,$us,$ls));

		File::copyDirectory("$strModuleTemplateDir/app/views/admin/modules/", "$strAppDir/views/admin/modules/$lp");
		File::copyDirectory("$strModuleTemplateDir/public/admin/modules/", "$strPublicDir/admin/modules/$lp");

		$this->info('Updating references and names...');
		foreach(File::allFiles("$strAppDir/views/admin/modules/$lp") AS $file){
			file_put_contents($file,$this->replaceModelNames(file_get_contents($file),$up,$lp,$us,$ls));
		}

		foreach(File::allFiles("$strPublicDir/admin/modules/$lp") AS $file){
			file_put_contents($file,$this->replaceModelNames(file_get_contents($file),$up,$lp,$us,$ls));
		}


		// cp "app/models/$COPY_UPPER_SINGULAR.php" "app/models/$NEW_UPPER_SINGULAR.php"
		// cp "app/controllers/admin/"$COPY_UPPER_SINGULAR"Controller.php" "app/controllers/admin/"$NEW_UPPER_SINGULAR"Controller.php"
		// cp -R "app/views/admin/modules/$COPY_LOWER_PLURAL" "app/views/admin/modules/$NEW_LOWER_PLURAL"
		// cp -R "public/admin/modules/$COPY_LOWER_PLURAL" "public/admin/modules/$NEW_LOWER_PLURAL"

		// find "public/admin/modules/$NEW_LOWER_PLURAL" -type f | xargs -I {} bash -c "sed -i \"s/$COPY_UPPER_PLURAL/$NEW_UPPER_PLURAL/g\" {} && sed -i \"s/$COPY_UPPER_SINGULAR/$NEW_UPPER_SINGULAR/g\" {} && sed -i \"s/$COPY_LOWER_PLURAL/$NEW_LOWER_PLURAL/g\" {} && sed -i \"s/$COPY_LOWER_SINGULAR/$NEW_LOWER_SINGULAR/g\" {}"
		// find "app/views/admin/modules/$NEW_LOWER_PLURAL" -type f | xargs -I {} bash -c "sed -i \"s/$COPY_UPPER_PLURAL/$NEW_UPPER_PLURAL/g\" {} && sed -i \"s/$COPY_UPPER_SINGULAR/$NEW_UPPER_SINGULAR/g\" {} && sed -i \"s/$COPY_LOWER_PLURAL/$NEW_LOWER_PLURAL/g\" {} && sed -i \"s/$COPY_LOWER_SINGULAR/$NEW_LOWER_SINGULAR/g\" {}"

		// find "app/controllers/admin/"$NEW_UPPER_SINGULAR"Controller.php" -type f | xargs -I {} bash -c "sed -i \"s/$COPY_UPPER_PLURAL/$NEW_UPPER_PLURAL/g\" {} && sed -i \"s/$COPY_UPPER_SINGULAR/$NEW_UPPER_SINGULAR/g\" {} && sed -i \"s/$COPY_LOWER_PLURAL/$NEW_LOWER_PLURAL/g\" {} && sed -i \"s/$COPY_LOWER_SINGULAR/$NEW_LOWER_SINGULAR/g\" {}"
		// find "./app/models/"$NEW_UPPER_SINGULAR".php" -type f | xargs -I {} bash -c "sed -i \"s/$COPY_UPPER_PLURAL/$NEW_UPPER_PLURAL/g\" {} && sed -i \"s/$COPY_UPPER_SINGULAR/$NEW_UPPER_SINGULAR/g\" {} && sed -i \"s/$COPY_LOWER_PLURAL/$NEW_LOWER_PLURAL/g\" {} && sed -i \"s/$COPY_LOWER_SINGULAR/$NEW_LOWER_SINGULAR/g\" {}"

		# Edit module files...
		$this->info('Module files generated.');
		$this->info("Further steps:");
		$this->info("1. Add route to routes.php");
		$this->info("2. Add menu item");
		$this->info("3. Update model");
		$this->info("4. Update controller");
		$this->info("5. Update fields.blade.php (and other admin view files)");
		$this->info("6. Update module JS/CSS");
		$this->info("7. Create front-end view");
		$this->info("8. Connect front-end view to data (view composer, controller, or directly in route)");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('upper_plural_name',InputArgument::REQUIRED, 'Uppercase plural name of the module\'s main object type.'),
			array('lower_plural_name',InputArgument::REQUIRED, 'Lowercase plural name of the module\'s main object type.'),
			array('upper_singular_name',InputArgument::REQUIRED, 'Uppercase singular name of the module\'s main object type.'),
			array('lower_singular_name',InputArgument::REQUIRED, 'Lowercase singular name of the module\'s main object type.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
