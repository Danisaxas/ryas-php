from pyrogram import Client
from configs._def_main_ import *
from data import *

@ryas(['id'])
async def id(client, msg):
    user_id = msg.from_user.id
    chat_id = msg.chat.id
    response = textid.format(chat_id=chat_id)
    
    await msg.reply_text(response, disable_web_page_preview=True, reply_to_message_id=msg.id)
