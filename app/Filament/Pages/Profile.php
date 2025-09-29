<?php

namespace App\Filament\Pages;

use Filament\Auth\Pages\EditProfile;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\Page;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;

class Profile extends EditProfile
{
    // public function getAvatarFormComponent() {}
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // $this->getAvatarFormComponent(),
                FileUpload::make('avatar')
                    ->disk('public')
                    ->visibility('public')
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->moveFiles(),
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getCurrentPasswordFormComponent(),
            ]);
    }
    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            ->rules([
                'required',
                'min: 1'
            ]);
    }
}
