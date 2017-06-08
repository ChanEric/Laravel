<?php
class ContactsTableSeeder extends Seeder {
    public function run() {
        DB::table('contacts')->insert(
            array(
                array(
                    'firstname' => 'Bob',
                    'lastname' => 'Dupont',
                    'subject' => 'sujet du contact bob',
                    'message' => 'un message pour bob',
                ),
 
                array(
                    'firstname' => 'Georges',
                    'lastname' => 'Lopez',
                    'subject' => 'sujet du contact georges',
                    'message' => 'un message pour george',
                ),
            )
        );
    }
}

?>