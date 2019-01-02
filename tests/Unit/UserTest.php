<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\Schema;

class UserTest extends TestCase
{
    /**
     * @test
     *
     */
     public function it_has_todos_table(){
       $this->assertTrue(Schema::hasTable('users'));
     }

     /**
      * @test
      *
      */
     public function it_has_id_column(){
       $this->assertTrue(Schema::hasColumn('users', 'id'));
     }
     /**
      * @test
      *
      */
     public function it_has_name_column(){
       $this->assertTrue(Schema::hasColumn('users', 'name'));
     }
     /**
      * @test
      *
      */
     public function it_has_email_column(){
       $this->assertTrue(Schema::hasColumn('users', 'email'));
     }
     /**
      * @test
      *
      */
     public function it_has_password_column(){
       $this->assertTrue(Schema::hasColumn('users', 'password'));
     }
     /**
      * @test
      *
      */
     public function it_has_created_at_column(){
       $this->assertTrue(Schema::hasColumn('users', 'created_at'));
     }

}
