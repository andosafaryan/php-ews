<?php
/**
 * Contains \jamesiarmes\PhpEws\Client.
 */

namespace jamesiarmes\PhpEws;

/**
 * Base class of the Exchange Web Services application.
 *
 * @package php-ews\Client
 */
class Client
{
    /**
     * Microsoft Exchange 2007
     *
     * @var string
     */
    const VERSION_2007 = 'Exchange2007';

    /**
     * Microsoft Exchange 2007 SP1
     *
     * @var string
     */
    const VERSION_2007_SP1 = 'Exchange2007_SP1';

    /**
     * Microsoft Exchange 2007 SP2
     *
     * @var string
     */
    const VERSION_2007_SP2 = 'Exchange2007_SP2';

    /**
     * Microsoft Exchange 2007 SP3
     *
     * @var string
     */
    const VERSION_2007_SP3 = 'Exchange2007_SP3';

    /**
     * Microsoft Exchange 2010
     *
     * @var string
     */
    const VERSION_2010 = 'Exchange2010';

    /**
     * Microsoft Exchange 2010 SP1
     *
     * @var string
     */
    const VERSION_2010_SP1 = 'Exchange2010_SP1';

    /**
     * Microsoft Exchange 2010 SP2
     *
     * @var string
     */
    const VERSION_2010_SP2 = 'Exchange2010_SP2';

    /**
     * Microsoft Exchange 2013.
     *
     * @var string
     */
    const VERSION_2013 = 'Exchange2013';

    /**
     * Microsoft Exchange 2013 SP1.
     *
     * @var string
     */
    const VERSION_2013_SP1 = 'Exchange2013_SP1';

    /**
     * Microsoft Exchange 2016.
     *
     * @var string
     */
    const VERSION_2016 = 'Exchange2016';

    /**
     * Password to use when connecting to the Exchange server.
     *
     * @var string
     */
    protected $password;

    /**
     * Location of the Exchange server.
     *
     * @var string
     */
    protected $server;

    /**
     * SOAP client used to make the request
     *
     * @var \jamesiarmes\PhpEws\SoapClient
     */
    protected $soap;

    /**
     * Username to use when connecting to the Exchange server.
     *
     * @var string
     */
    protected $username;

    /**
     * Exchange impersonation
     *
     * @var \jamesiarmes\PhpEws\Type\ExchangeImpersonationType
     */
    protected $impersonation;

    /**
     * Miscrosoft Exchange version that we are going to connect to
     *
     * @var string
     *
     * @see Client::VERSION_2007
     * @see Client::VERSION_2007_SP1
     * @see Client::VERSION_2007_SP2
     * @see Client::VERSION_2007_SP3
     * @see Client::VERSION_2010
     * @see Client::VERSION_2010_SP1
     * @see Client::VERSION_2010_SP2
     */
    protected $version;

    /**
     * Constructor for the ExchangeWebServices class
     *
     * @param string $server
     * @param string $username
     * @param string $password
     * @param string $version One of the Client::VERSION_* constants.
     */
    public function __construct(
        $server = null,
        $username = null,
        $password = null,
        $version = self::VERSION_2007
    ) {
        // Set the object properties.
        $this->setServer($server);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setVersion($version);
    }

    /**
     * Returns the SOAP Client that may be used to make calls against the server
     *
     * @return \jamesiarmes\PhpEws\SoapClient
     */
    public function getClient()
    {
        return $this->initializeSoapClient();
    }

    /**
     * Sets the impersonation property
     *
     * @param \jamesiarmes\PhpEws\Type\ExchangeImpersonationType $impersonation
     */
    public function setImpersonation($impersonation)
    {
        $this->impersonation = $impersonation;

        return true;
    }

    /**
     * Sets the password property
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return true;
    }

    /**
     * Sets the server property
     *
     * @param string $server
     */
    public function setServer($server)
    {
        $this->server = $server;

        return true;
    }

    /**
     * Sets the user name property
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return true;
    }

    /**
     * Sets the version property
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return true;
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\AddDelegateType $request
     * @return \jamesiarmes\PhpEws\Response\AddDelegateResponseMessageType
     */
    public function AddDelegate($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Adds a distribution group to the instant messaging (IM) list in the
     * Unified Contact Store.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\AddDistributionGroupToImListType $request
     * @return \jamesiarmes\PhpEws\Response\AddDistributionGroupToImListResponseMessageType
     */
    public function AddDistributionGroupToImList($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Adds an existing instant messaging (IM) contact to a group.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\AddImContactToGroup $request
     * @return \jamesiarmes\PhpEws\Response\AddImContactToGroupResponseMessageType
     */
    public function AddImContactToGroup($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Adds a new instant messaging (IM) group to a mailbox.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\AddImGroupType $request
     * @return \jamesiarmes\PhpEws\Response\AddImGroupResponseMessageType
     */
    public function AddImGroup($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Adds a new contact to an instant messaging (IM) group.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\AddNewImContactToGroup $request
     * @return \jamesiarmes\PhpEws\Response\AddNewImContactToGroupResponseMessageType
     */
    public function AddNewImContactToGroup($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Adds a new contact to a group based on a contact's phone number.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\AddNewTelUriContactToGroupType $request
     * @return \jamesiarmes\PhpEws\Response\AddNewTelUriContactToGroupResponse
     */
    public function AddNewTelUriContactToGroup($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Sets a one-time or follow up action on all the items in a conversation.
     *
     * This operation allows you to categorize, move, copy, delete, and set the
     * read state on all items in a conversation. Actions can also be set for
     * new messages in a conversation.
     *
     * @since Exchange 2010 SP1
     *
     * @param \jamesiarmes\PhpEws\Request\ApplyConversationActionType $request
     * @return \jamesiarmes\PhpEws\Response\ApplyConversationActionResponseType
     */
    public function ApplyConversationAction($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Moves an item into the mailbox user's archive mailbox.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\ArchiveItemType $request
     * @return \jamesiarmes\PhpEws\Response\ArchiveItemResponse
     */
    public function ArchiveItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\ConvertIdType $request
     * @return \jamesiarmes\PhpEws\Response\ConvertIdResponseType
     */
    public function ConvertId($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\CopyFolderType $request
     * @return \jamesiarmes\PhpEws\Response\CopyFolderResponseType
     */
    public function CopyFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\CopyItemType $request
     * @return \jamesiarmes\PhpEws\Response\CopyItemResponseType
     */
    public function CopyItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\CreateAttachmentType $request
     * @return \jamesiarmes\PhpEws\Response\CreateAttachmentResponseType
     */
    public function CreateAttachment($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\CreateFolderType $request
     * @return \jamesiarmes\PhpEws\Response\CreateFolderResponseType
     */
    public function CreateFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Creates a folder hierarchy.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\CreateFolderPathType $request
     * @return \jamesiarmes\PhpEws\Response\CreateFolderPathResponseType
     */
    public function CreateFolderPath($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\CreateItemType $request
     * @return \jamesiarmes\PhpEws\Response\CreateItemResponseType
     */
    public function CreateItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\CreateManagedFolderRequestType $request
     * @return \jamesiarmes\PhpEws\Response\CreateManagedFolderResponseType
     */
    public function CreateManagedFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Creates a user configuration object on a folder.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\CreateUserConfigurationType $request
     * @return \jamesiarmes\PhpEws\Response\CreateUserConfigurationResponseType
     */
    public function CreateUserConfiguration($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\DeleteAttachmentType $request
     * @return \jamesiarmes\PhpEws\Response\DeleteAttachmentResponseType
     */
    public function DeleteAttachment($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\DeleteFolderType $request
     * @return \jamesiarmes\PhpEws\Response\DeleteFolderResponseType
     */
    public function DeleteFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\DeleteItemType $request
     * @return \jamesiarmes\PhpEws\Response\DeleteItemResponseType
     */
    public function DeleteItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Deletes a user configuration object on a folder.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\DeleteUserConfigurationType $request
     * @return \jamesiarmes\PhpEws\Response\DeleteUserConfigurationResponseType
     */
    public function DeleteUserConfiguration($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Disables a mail app for Outlook.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\DisableAppType $request
     * @return \jamesiarmes\PhpEws\Response\DisableAppResponseType
     */
    public function DisableApp($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Terminates a telephone call.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\DisconnectPhoneCallType $request
     * @return \jamesiarmes\PhpEws\Response\DisconnectPhoneCallResponseMessageType
     */
    public function DisconnectPhoneCall($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Empties folders in a mailbox.
     *
     * Optionally, this operation enables you to delete the subfolders of the
     * specified folder. When a subfolder is deleted, the subfolder and the
     * messages within the subfolder are deleted.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\EmptyFolderType $request
     * @return \jamesiarmes\PhpEws\Response\EmptyFolderResponseType
     */
    public function EmptyFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\ExpandDLType $request
     * @return \jamesiarmes\PhpEws\Response\ExpandDLResponseType
     */
    public function ExpandDL($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Exports items out of a mailbox.
     *
     * @since Exchange 2010 SP1
     *
     * @param \jamesiarmes\PhpEws\Request\ExportItemsType $request
     * @return \jamesiarmes\PhpEws\Response\ExportItemsResponseType
     */
    public function ExportItems($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Enumerates a list of conversations in a folder.
     *
     * @param \jamesiarmes\PhpEws\Request\FindConversationType $request
     * @return \jamesiarmes\PhpEws\Response\FindConversationResponseMessageType
     */
    public function FindConversation($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\FindFolderType $request
     * @return \jamesiarmes\PhpEws\Response\FindFolderResponseType
     */
    public function FindFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\FindItemType $request
     * @return \jamesiarmes\PhpEws\Response\FindItemResponseType
     */
    public function FindItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Finds messages that meet the specified criteria.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\FindMessageTrackingReportRequestType $request
     * @return \jamesiarmes\PhpEws\Response\FindMessageTrackingReportResponseMessageType
     */
    public function FindMessageTrackingReport($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Returns all persona objects from a specified Contacts folder or retrieves
     * contacts that match a specified query string.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\FindPeopleType $request
     * @return \jamesiarmes\PhpEws\Response\FindPeopleResponseMessageType
     */
    public function FindPeople($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves app manifests.
     *
     * @since Exchange 2013 SP1
     *
     * @param \jamesiarmes\PhpEws\Request\GetAppManifestsType $request
     * @return \jamesiarmes\PhpEws\Response\GetAppManifestsResponseType
     */
    public function GetAppManifests($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves the URL for the app marketplace that a client can visit to
     * acquire apps to install in a mailbox.
     *
     * @since Exchange 2013 SP1
     *
     * @param \jamesiarmes\PhpEws\Request\GetAppMarketplaceUrl $request
     * @return \jamesiarmes\PhpEws\Response\GetAppMarketplaceUrlResponseMessageType
     */
    public function GetAppMarketplaceUrl($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\GetAttachmentType $request
     * @return \jamesiarmes\PhpEws\Response\GetAttachmentResponseType
     */
    public function GetAttachment($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Gets a client access token for a mail app for Outlook.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\GetClientAccessTokenType $request
     * @return \jamesiarmes\PhpEws\Response\GetClientAccessTokenResponseType
     */
    public function GetClientAccessToken($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves one or more sets of items that are organized in to nodes in a
     * conversation.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\GetConversationItemsType $request
     * @return \jamesiarmes\PhpEws\Response\GetConversationItemsResponseType
     */
    public function GetConversationItems($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\GetDelegateType $request
     * @return \jamesiarmes\PhpEws\Response\GetDelegateResponseMessageType
     */
    public function GetDelegate($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Returns configuration information for in-place holds, saved discovery
     * searches, and the mailboxes that are enabled for discovery search.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\GetDiscoverySearchConfigurationType $request
     * @return \jamesiarmes\PhpEws\Response\GetDiscoverySearchConfigurationResponseMessageType
     */
    public function GetDiscoverySearchConfiguration($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\GetEventsType $request
     * @return \jamesiarmes\PhpEws\Response\GetEventsResponseType
     */
    public function GetEvents($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\GetFolderType $request
     * @return \jamesiarmes\PhpEws\Response\GetFolderResponseType
     */
    public function GetFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves the mailboxes that are under a specific hold and the associated
     * hold query.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\GetHoldOnMailboxesType $request
     * @return \jamesiarmes\PhpEws\Response\GetHoldOnMailboxesResponseMessageType
     */
    public function GetHoldOnMailboxes($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves the list of instant messaging (IM) groups and IM contact
     * personas in a mailbox.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\GetImItemListType $request
     * @return \jamesiarmes\PhpEws\Response\GetImItemListResponseMessageType
     */
    public function GetImItemList($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves information about instant messaging (IM) groups and IM contact
     * personas.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\GetImItemsType $request
     * @return \jamesiarmes\PhpEws\Response\GetImItemsResponse
     */
    public function GetImItems($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves Inbox rules in the identified user's mailbox.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\GetInboxRulesRequestType $request
     * @return \jamesiarmes\PhpEws\Response\GetInboxRulesResponseType
     */
    public function GetInboxRules($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\GetItemType $request
     * @return \jamesiarmes\PhpEws\Response\GetItemResponseType
     */
    public function GetItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves the mail tips information for the specified mailbox.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\GetMailTipsType $request
     * @return \jamesiarmes\PhpEws\Response\GetMailTipsResponseMessageType
     */
    public function GetMailTips($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves tracking information about the specified messages.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\GetMessageTrackingReportRequestType $request
     * @return \jamesiarmes\PhpEws\Response\GetMessageTrackingReportResponseMessageType
     */
    public function GetMessageTrackingReport($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieves details about items that cannot be indexed.
     *
     * This includes, but is not limited to, the item identifier, an error code,
     * an error description, when an attempt was made to index the item, and
     * additional information about the file.
     *
     * @since Exchange 2013
     *
     * @param \jamesiarmes\PhpEws\Request\GetNonIndexableItemDetailsType $request
     * @return \jamesiarmes\PhpEws\Response\GetNonIndexableItemDetailsResponseMessageType
     */
    public function GetNonIndexableItemDetails($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Retrieve the timezones supported by the server.
     *
     * @since Exchange 2010
     *
     * @param \jamesiarmes\PhpEws\Request\GetServerTimeZonesType $request
     * @return \jamesiarmes\PhpEws\Response\GetServerTimeZonesResponseType
     */
    public function GetServerTimeZones($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\GetUserAvailabilityRequestType $request
     * @return \jamesiarmes\PhpEws\Response\GetUserAvailabilityResponseType
     */
    public function GetUserAvailability($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\GetUserOofSettingsRequest $request
     * @return \jamesiarmes\PhpEws\Response\GetUserOofSettingsResponse
     */
    public function GetUserOofSettings($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\MoveFolderType $request
     * @return \jamesiarmes\PhpEws\Response\MoveFolderResponseType
     */
    public function MoveFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\MoveItemType $request
     * @return \jamesiarmes\PhpEws\Response\MoveItemResponseType
     */
    public function MoveItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\RemoveDelegateType $request
     * @return \jamesiarmes\PhpEws\Response\RemoveDelegateResponseMessageType
     */
    public function RemoveDelegate($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\ResolveNamesType $request
     * @return \jamesiarmes\PhpEws\Response\ResolveNamesResponseType
     */
    public function ResolveNames($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\SendItemType $request
     * @return \jamesiarmes\PhpEws\Response\SendItemResponseType
     */
    public function SendItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\SetUserOofSettingsRequest $request
     * @return \jamesiarmes\PhpEws\Response\SetUserOofSettingsResponse
     */
    public function SetUserOofSettings($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\SubscribeType $request
     * @return \jamesiarmes\PhpEws\Response\SubscribeResponseType
     */
    public function Subscribe($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\SyncFolderHierarchyType $request
     * @return \jamesiarmes\PhpEws\Response\SyncFolderHierarchyResponseType
     */
    public function SyncFolderHierarchy($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\SyncFolderItemsType $request
     * @return \jamesiarmes\PhpEws\Response\SyncFolderItemsResponseType
     */
    public function SyncFolderItems($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\UnsubscribeType $request
     * @return \jamesiarmes\PhpEws\Response\UnsubscribeResponseType
     */
    public function Unsubscribe($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\UpdateDelegateType $request
     * @return \jamesiarmes\PhpEws\Response\UpdateDelegateResponseMessageType
     */
    public function UpdateDelegate($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\UpdateFolderType $request
     * @return \jamesiarmes\PhpEws\Response\UpdateFolderResponseType
     */
    public function UpdateFolder($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Function Description
     *
     * @param \jamesiarmes\PhpEws\Request\UpdateItemType $request
     * @return \jamesiarmes\PhpEws\Response\UpdateItemResponseType
     */
    public function UpdateItem($request)
    {
        $this->initializeSoapClient();
        $response = $this->soap->{__FUNCTION__}($request);

        return $this->processResponse($response);
    }

    /**
     * Initializes the SoapClient object to make a request
     *
     * @return \jamesiarmes\PhpEws\SoapClient
     *
     * TODO: Build a class map that we can pass to the client.
     */
    protected function initializeSoapClient()
    {
        $this->soap = new SoapClient(
            dirname(__FILE__) . '/assets/services.wsdl',
            array(
                'user' => $this->username,
                'password' => $this->password,
                'version' => $this->version,
                'location' => 'https://' . $this->server . '/EWS/Exchange.asmx',
                'impersonation' => $this->impersonation,
            )
        );

        return $this->soap;
    }

    /**
     * Process a response to verify that it succeeded and take the appropriate
     * action
     *
     * @throws \Exception
     *
     * @param \stdClass $response
     * @return \stdClass
     */
    protected function processResponse($response)
    {
        // If the soap call failed then we need to throw an exception.
        $code = $this->soap->getResponseCode();
        if ($code != 200) {
            throw new \Exception(
                "SOAP client returned status of $code.",
                $code
            );
        }

        return $response;
    }
}
