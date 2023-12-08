<?php

use JetBrains\PhpStorm\Pure;

interface IFileManager
{
    public function downloadFile($fileId);
}

class RealFileManager implements IFileManager
{
    public function downloadFile($fileId)
    {
        echo "Downloading file $fileId\n";
    }
}

class FileManagerProxy implements IFileManager
{
    private RealFileManager $realFileManager;
    private User $user;

    #[Pure] public function __construct(User $user)
    {
        $this->realFileManager = new RealFileManager();
        $this->user = $user;
    }


    public function downloadFile($fileId)
    {
        if ($this->user->hasPermission($fileId)) {
            $this->realFileManager->downloadFile($fileId);
        } else {
            echo "Access denied. User does not have permission to download the file.\n";
        }
    }
}


class User
{
    private array $permissions = [];

    public function addPermission($fileId)
    {
        $this->permissions[] = $fileId;
    }

    public function hasPermission($fileId): bool
    {
        return in_array($fileId, $this->permissions);
    }
}

$user = new User();
$user->addPermission('test');

$fileManagerProxy = new FileManagerProxy($user);

$fileManagerProxy->downloadFile('test');
$fileManagerProxy->downloadFile('test1');