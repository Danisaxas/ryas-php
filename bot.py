from configs._def_main_ import *
from pyrogram import Client

# Crear instancia del bot de Pyrogram
app = Client(
    "Ryas",
    api_id=conta('apid'),
    api_hash=conta('hasd'),
    bot_token=conta('token'),
    plugins=dict(root="pluss")
)

# Respuesta al callback query
@app.on_callback_query()
async def callpri(app, callback_query):
    if callback_query.message.reply_to_message is not None and callback_query.message.reply_to_message.from_user.id != callback_query.from_user.id:
        await callback_query.answer("❗️ Access denied  ❗️")
        return
    else:
        await callback_query.continue_propagation()

# Iniciar el bot
if app:
    app.run()  # Ejecuta el bot de manera adecuada
else:
    print('Error faltan argumentos.')
