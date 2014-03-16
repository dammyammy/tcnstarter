@servers(['production' => '', 'staging' => ''])

@task('setupp', ['on' => 'production'])
    
@endtask

@task('setups', ['on' => 'staging'])
  
@endtask