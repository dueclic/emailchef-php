<?php

namespace EMailChef\Command\Api;

use EMailChef\Service\ApiService;

class ImportContactsInGroupCommand
{
    protected $apiService;

    public function __construct($apiService = null)
    {
        $this->apiService = $apiService ?: new ApiService();
    }

    public function execute($headers, $contacts, $listId, $groupId)
    {
        $importContactsCommand = new ImportContactsCommand();
        $importContactsCommand->execute($headers, $contacts, $listId);

        $emails = array();
        foreach ($contacts as $contact) {
            $emails[] = $contact['email'];
        }

        $addEmailsToGroupCommand = new AddEmailsToGroupCommand();
        $addEmailsToGroupCommand->execute($headers, $emails, $listId, $groupId);

        return true;
    }
}
