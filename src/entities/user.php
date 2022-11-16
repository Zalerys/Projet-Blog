<?

namespace entities;

class User extends Model
{
    private string $id;
    private string $role_id;
    private string $name;
    private string $email;
    private string $password;
    private ?string $datetime;
    private ?string $profile_picture;
    private ?string $birthdate;
}