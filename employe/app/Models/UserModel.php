<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email','password','role','firstname','lastname','slug','mobile','status','updated_at','username'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

  




    protected function beforeInsert(array $data)
      {
          $data = $this->passwordHash($data);
          return $data;
      }


    protected function beforeUpdate(array $data)
      {

       $data = $this->passwordHash($data);
       return $data;
      }


    protected function passwordHash(array $data)
      {
        if(isset($data['data']['password']))
        $data['data']['password']=password_hash( $data['data']['password'],PASSWORD_DEFAULT);
        return $data;
      }


      public function getusers($slug = false)
      {
          if ($slug === false)
          {
              
            return $this->orderBy('id','DESC')->findAll();
                          
          }
          return $this->asArray()
                      ->where(['slug' => $slug])
                      ->first();
       }

       public function getUserStatusById($id){

          return $this->db->table($this->table)
                ->where('id',$id)
                ->get()
                ->getRow();

       }

       public function change_status($id,$stat=1) 
       {
           $newdata=[];
            if ($stat==1){
            $newdata =
                    [
                      'id'  =>$id ,
                    'active'=>0,
                      'updated_at' => date('Y-m-d H:i:s',now()),
                    ];
         }
              else{

                $newdata =
                        [
                          'id'  =>$id ,
                        'active'=>1,
                          'updated_at' => date('Y-m-d H:i:s',now()),
                        ];

           }
                     $this->save($newdata);


         }

        
          
}
