<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Student;

class StudentTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage()
    {
        $response = $this->get('/');

        $response->assertSeeText('Student Management System');
        $response->assertSeeText('Student List');
    }

    public function test_addStudent()
    {

        //ARRANGE PART
        $student = new Student();
        $student->roll_no = 'A000050'; 
        $student->name = 'Arun Kumar'; 
        $student->email = 'arunkumar@gmail.com'; 
        $student->gender = 'M'; 
        $student->year = 'Third'; 
        $student->department_id = '101'; 
        $student->address = ''; 
        $student->visitor = ''; 
        $student->save();

        //ACT
        $response = $this->get('/student');

        //ASSERT
        $response->assertSeeText('Arun Kumar');
        $this->assertDatabaseHas('students',[
            'roll_no' => 'A000050'
        ]);
    }

    public function test_storeStudentSuccess()
    {
        $params =[
            'roll_no' => 'A000051',
            'name' => 'Arun Kumar', 
            'email' => 'arunkumaran@gmail.com', 
            'gender' => 'M',
            'year' => 'Third', 
            'department_id' => '101', 
            'address' => 'Chennai',
            'visitor' => '' 
        ];

        $this->post('/student', $params)
        ->assertStatus(302)
        ->assertSessionHas('status');

    
        $this->assertEquals(session('status'),'Student has been added!');
    }

    public function test_storeStudentFailed()
    {
        $params =[
            'roll_no' => '',
            'name' => '', 
            'email' => 'arunkumaran@gmail.com', 
            'gender' => 'M',
            'year' => 'Third', 
            'department_id' => '101', 
            'address' => 'Chennai',
            'visitor' => '' 
        ];

        $this->post('/student', $params)
        ->assertStatus(302)
        ->assertSessionHas('errors');

    
        $message = session('errors')->getMessages(); //dd($message->getMessages());
        $this->assertEquals($message['roll_no'][0],'The roll no field is required.');
        $this->assertEquals($message['name'][0],'The name field is required.');
    }

    public function test_updateStudent()
    {
        $student = new Student();
        $student->roll_no = 'A000052'; 
        $student->name = 'Anula Banu'; 
        $student->email = 'anulabanu@gmail.com'; 
        $student->gender = 'F'; 
        $student->year = 'Second'; 
        $student->department_id = '103'; 
        $student->address = 'Chennai'; 
        $student->visitor = ''; 
        $student->save();

        $this->assertDatabaseHas('students',[
            'roll_no' => 'A000052'
        ]);
        
        //$this->assertDatabaseHas('students', $student->toArray());
        //dd($student); die();
        $params =[
            'roll_no' => 'A000052',
            'name' => 'Anula Banu', 
            'email' => 'anulabanu@gmail.com', 
            'gender' => 'F',
            'year' => 'Third', 
            'department_id' => '101', 
            'address' => 'Bangalore',
            'visitor' => '' 
        ];

        $this->put("/student/{$student->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        //$message = session('errors')->getMessages(); dd($message);

        $this->assertEquals(session('status'), 'Student has been updated');
        // $this->assertDatabaseMissing('students', [
        //     'roll_no' => 'A000052',
        //     'year' => 'First',
        //     'address' => 'Chennai'
        // ]);
        $this->assertDatabaseHas('students', [
            'year' => 'Third', 
            'department_id' => '101', 
            'address' => 'Bangalore'
        ]);
    }

    public function test_deleteStudent() 
    {
        $student = $this->createDummyBlogPost();
        
        $this->assertDatabaseHas('students',[
            'roll_no' => 'A000050'
        ]);

        $this->delete("/student/{$student->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Student has been deleted');
        $this->assertDatabaseMissing('students', [
            'roll_no' => 'A000050'
        ]);
    }

    private function createDummyBlogPost()
    {
        //ARRANGE PART
        $student = new Student();
        $student->roll_no = 'A000050'; 
        $student->name = 'Arun Kumar'; 
        $student->email = 'arunkumar@gmail.com'; 
        $student->gender = 'M'; 
        $student->year = 'Third'; 
        $student->department_id = '101'; 
        $student->address = ''; 
        $student->visitor = ''; 
        $student->save();

        return $student;
    }
}
