<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SwaggerGenerate extends Command {
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'sg';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return int|void
   */
  public function handle() {
    $this->call('l5-swagger:generate', ['--all' => true]);

    $this->call('l5-swagger:publish');
  }
}
