<?php

namespace Sturt\Maximizer\LaravelSlackEvents;

use Sturt\Maximizer\LaravelSlackEvents\Events\Base\SlackEvent;
use Sturt\Maximizer\LaravelSlackEvents\Events\ChannelArchive;
use Sturt\Maximizer\LaravelSlackEvents\Events\ChannelCreated;
use Sturt\Maximizer\LaravelSlackEvents\Events\ChannelDeleted;
use Sturt\Maximizer\LaravelSlackEvents\Events\ChannelHistoryChanged;
use Sturt\Maximizer\LaravelSlackEvents\Events\ChannelJoined;
use Sturt\Maximizer\LaravelSlackEvents\Events\ChannelRename;
use Sturt\Maximizer\LaravelSlackEvents\Events\ChannelUnarchive;
use Sturt\Maximizer\LaravelSlackEvents\Events\DndUpdated;
use Sturt\Maximizer\LaravelSlackEvents\Events\DndUpdatedUser;
use Sturt\Maximizer\LaravelSlackEvents\Events\EmailDomainChanged;
use Sturt\Maximizer\LaravelSlackEvents\Events\EmojiChanged;
use Sturt\Maximizer\LaravelSlackEvents\Events\FileChange;
use Sturt\Maximizer\LaravelSlackEvents\Events\FileCommentAdded;
use Sturt\Maximizer\LaravelSlackEvents\Events\FileCommentDeleted;
use Sturt\Maximizer\LaravelSlackEvents\Events\FileCommentEdited;
use Sturt\Maximizer\LaravelSlackEvents\Events\FileCreated;
use Sturt\Maximizer\LaravelSlackEvents\Events\FileDeleted;
use Sturt\Maximizer\LaravelSlackEvents\Events\FilePublic;
use Sturt\Maximizer\LaravelSlackEvents\Events\FileShared;
use Sturt\Maximizer\LaravelSlackEvents\Events\FileUnshared;
use Sturt\Maximizer\LaravelSlackEvents\Events\GroupArchive;
use Sturt\Maximizer\LaravelSlackEvents\Events\GroupClose;
use Sturt\Maximizer\LaravelSlackEvents\Events\GroupHistoryChanged;
use Sturt\Maximizer\LaravelSlackEvents\Events\GroupOpen;
use Sturt\Maximizer\LaravelSlackEvents\Events\GroupRename;
use Sturt\Maximizer\LaravelSlackEvents\Events\GroupUnarchive;
use Sturt\Maximizer\LaravelSlackEvents\Events\ImClose;
use Sturt\Maximizer\LaravelSlackEvents\Events\ImCreated;
use Sturt\Maximizer\LaravelSlackEvents\Events\ImHistoryChanged;
use Sturt\Maximizer\LaravelSlackEvents\Events\ImOpen;
use Sturt\Maximizer\LaravelSlackEvents\Events\LinkShared;
use Sturt\Maximizer\LaravelSlackEvents\Events\Message;
use Sturt\Maximizer\LaravelSlackEvents\Events\MessageChannels;
use Sturt\Maximizer\LaravelSlackEvents\Events\MessageGroups;
use Sturt\Maximizer\LaravelSlackEvents\Events\MessageIm;
use Sturt\Maximizer\LaravelSlackEvents\Events\MessageMpim;
use Sturt\Maximizer\LaravelSlackEvents\Events\PinAdded;
use Sturt\Maximizer\LaravelSlackEvents\Events\PinRemoved;
use Sturt\Maximizer\LaravelSlackEvents\Events\ReactionAdded;
use Sturt\Maximizer\LaravelSlackEvents\Events\ReactionRemoved;
use Sturt\Maximizer\LaravelSlackEvents\Events\StarAdded;
use Sturt\Maximizer\LaravelSlackEvents\Events\StarRemoved;
use Sturt\Maximizer\LaravelSlackEvents\Events\SubteamCreated;
use Sturt\Maximizer\LaravelSlackEvents\Events\SubteamSelfAdded;
use Sturt\Maximizer\LaravelSlackEvents\Events\SubteamSelfRemoved;
use Sturt\Maximizer\LaravelSlackEvents\Events\SubteamUpdated;
use Sturt\Maximizer\LaravelSlackEvents\Events\TeamDomainChange;
use Sturt\Maximizer\LaravelSlackEvents\Events\TeamJoin;
use Sturt\Maximizer\LaravelSlackEvents\Events\TeamRename;
use Sturt\Maximizer\LaravelSlackEvents\Events\UrlVerification;
use Sturt\Maximizer\LaravelSlackEvents\Events\UserChange;

/**
 * Event factory
 *
 * @package Sturt\Maximizer\LaravelSlackEvents
 */
class EventCreator
{
    /**
     * @var array event type to event class mapping
     */
    public $map = [
        'channel_archive' => ChannelArchive::class,
        'channel_created' => ChannelCreated::class,
        'channel_deleted' => ChannelDeleted::class,
        'channel_history_changed' => ChannelHistoryChanged::class,
        'channel_joined' => ChannelJoined::class,
        'channel_rename' => ChannelRename::class,
        'channel_unarchive' => ChannelUnarchive::class,
        'dnd_updated' => DndUpdated::class,
        'dnd_updated_user' => DndUpdatedUser::class,
        'email_domain_changed' => EmailDomainChanged::class,
        'emoji_changed' => EmojiChanged::class,
        'file_change' => FileChange::class,
        'file_comment_added' => FileCommentAdded::class,
        'file_comment_deleted' => FileCommentDeleted::class,
        'file_comment_edited' => FileCommentEdited::class,
        'file_created' => FileCreated::class,
        'file_deleted' => FileDeleted::class,
        'file_public' => FilePublic::class,
        'file_shared' => FileShared::class,
        'file_unshared' => FileUnshared::class,
        'group_archive' => GroupArchive::class,
        'group_close' => GroupClose::class,
        'group_history_changed' => GroupHistoryChanged::class,
        'group_open' => GroupOpen::class,
        'group_rename' => GroupRename::class,
        'group_unarchive' => GroupUnarchive::class,
        'im_close' => ImClose::class,
        'im_created' => ImCreated::class,
        'im_history_changed' => ImHistoryChanged::class,
        'im_open' => ImOpen::class,
        'link_shared' => LinkShared::class,
        'message' => Message::class,
        'message.channels' => MessageChannels::class,
        'message.groups' => MessageGroups::class,
        'message.im' => MessageIm::class,
        'message.mpim' => MessageMpim::class,
        'pin_added' => PinAdded::class,
        'pin_removed' => PinRemoved::class,
        'reaction_added' => ReactionAdded::class,
        'reaction_removed' => ReactionRemoved::class,
        'star_added' => StarAdded::class,
        'star_removed' => StarRemoved::class,
        'subteam_created' => SubteamCreated::class,
        'subteam_self_added' => SubteamSelfAdded::class,
        'subteam_self_removed' => SubteamSelfRemoved::class,
        'subteam_updated' => SubteamUpdated::class,
        'team_domain_change' => TeamDomainChange::class,
        'team_join' => TeamJoin::class,
        'team_rename' => TeamRename::class,
        'url_verification' => UrlVerification::class,
        'user_change' => UserChange::class,
    ];

    /**
     * Returns new event instance
     *
     * @param $eventType
     * @return SlackEvent
     */
    public function make($eventType)
    {
        return new $this->map[$eventType];
    }
}
