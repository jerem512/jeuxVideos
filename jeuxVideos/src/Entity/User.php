<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *@UniqueEntity(
 *fields = {"mail_adress"},
 *message = "Un compte est déjà enregistré sous cette *adresse mail"
 *)
 */
class User implements UserInterface
{   

    const SEX = [
        0=>"Homme",
        1=>"Femme"];

        const ROLE = [
            0=>"Utilisateur",
            1=>"Admin",
            2=>"Big Boss"];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="integer")
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     * message = "The email is not valid."
     * )
     */
    private $mail_adress;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\Length(min=8)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10, max=50, minMessage="Votre pseudo doit faire au minimum 10 caractères.")
     */
    private $pseudo;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="integer")
     */
    private $sex;

    /**
     *@Assert\EqualTo(propertyPath="password", message = "Les mots de passe doivent être identiques.")
     */

    public $confirm_password;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getMailAdress(): ?string
    {
        return $this->mail_adress;
    }

    public function setMailAdress(string $mail_adress): self
    {
        $this->mail_adress = $mail_adress;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getSex(): ?int
    {
        return $this->sex;
    }

    public function setSex(int $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function eraseCredentials(){

    }

    public function getSalt(){

    }

    public function getRoles(){
        return ["ROLE_USER"];
        return ["ROLE_ADMIN"];
        return ["ROLE_SUPERADMIN"];
    }

     public function getUsername(){
        return $this->name;
    }
}
