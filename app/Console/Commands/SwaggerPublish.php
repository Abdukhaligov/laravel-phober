<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SwaggerPublish extends Command{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'l5-swagger:publish';
  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Publish swagger static files';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct(){
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int
   */
  public function handle(){
    $path = implode(DIRECTORY_SEPARATOR, [
      base_path(),
      'vendor',
      'swagger-api',
      'swagger-ui',
      'dist',
      ''
    ]);

    $jsonsFullPath = config('l5-swagger.defaults.paths.docs');

    foreach(config('l5-swagger.documentations') as $key => $documentation){
      $docPath = $documentation["routes"]["docs"];
      $json = $documentation["paths"]["docs_json"];

      $this->line("<fg=green>$key: </>$docPath");
      $docPathNew = implode(DIRECTORY_SEPARATOR, [public_path(), $docPath, '']);
      $assetPathNew = implode(DIRECTORY_SEPARATOR, [$docPathNew, 'asset', '']);

      if(!File::isDirectory($docPathNew)){
        File::makeDirectory($docPathNew, 0777, true, true);

        $this->line("<fg=yellow>\tCreate public/doc-path directory</>");
      }

      File::copy(implode(DIRECTORY_SEPARATOR, [$jsonsFullPath, $json]),
        $docPathNew.(Str::replaceLast($path, '', $json)));

      $this->line("<fg=yellow>\tCreate json file</>");

      if(!File::isDirectory($assetPathNew)){
        File::makeDirectory($assetPathNew, 0777, true, true);
        $this->line("<fg=yellow>\tCreate public/asset (static files) directory</>");
      }

      $this->line("<fg=yellow>\tCopying static files</>");
      foreach(File::allfiles($path) as $file){
        File::copy($file, $assetPathNew.(Str::replaceLast($path, '', $file)));
      }
    }
  }
}
